<?php

namespace Blast\Language;

use Blast\Language\LexerInterface;
use Exception;

class Lexer implements LexerInterface
{
    /**
     * @var array<int>
     */
    private const RESERVED_STRINGS = [
        self::T_VAR,
        self::T_EXIT,
        self::T_FUN,
        self::T_RETURN,
        self::T_IMPORT,
        self::T_IDENTICAL,
        self::T_AND,
        self::T_OR,
        self::T_NOT,
        self::T_TRUE,
        self::T_FALSE,
        self::T_IF,
        self::T_ELIF,
        self::T_ELSE,
        self::T_WHILE,
        self::T_BREAK,
        self::T_FOR,
        self::T_TYPE,
        self::T_NEW,
    ];

    /**
     * @var array<int>
     */
    private const SINGLE_CHAR_TOKENS = [
        self::T_PLUS,
        self::T_MINUS,
        self::T_TIMES,
        self::T_DIV,
        self::T_SEMICOLON,
        self::T_OPEN_PARENTHESIS,
        self::T_CLOSE_PARENTHESIS,
        self::T_COMMA,
        self::T_OPEN_BRACES,
        self::T_CLOSE_BRACES,
        self::T_EQ,
        self::T_DOT,
    ];

    /**
     * @var array<string>
     */
    private readonly array $chars;
    private int $currentCharIndex;
    private ?string $currentChar;
    private ?string $previousChar;
    private readonly int $lastIndex;
    private int $line = 1;
    private int $lineColumn = 0;

    private ?string $value = null;

    public function __construct(string $input)
    {
        $this->chars = str_split($input);
        $this->currentCharIndex = 0;
        $this->currentChar = $this->chars[$this->currentCharIndex];
        $this->lastIndex = count($this->chars) - 1;
    }

    public function getLVal()
    {
        return $this->value;
    }

    public function yylex(): int
    {
        if ($this->eof()) {
            return self::YYEOF;
        }

        return $this->getNextToken();
    }

    public function yyerror(string $message): void
    {
        printf($message . PHP_EOL . "unexpected \"{$this->value}\" at line {$this->charLine()}" . PHP_EOL);
    }

    private function eof(): bool
    {
        return $this->currentCharIndex > $this->lastIndex;
    }

    private function next(): ?string
    {
        $this->previousChar = $this->currentChar;
        $this->currentCharIndex++;
        $this->lineColumn++;
        if ($this->eof()) {
            return null;
        }
        $currentChar = $this->currentChar = $this->chars[$this->currentCharIndex];
        if ($this->tokenIs(self::T_EOL, $currentChar)) {
            $this->line++;
            $this->lineColumn = 0;
        }
        return $currentChar;
    }

    /**
     * @throws \Exception
     */
    private function getNextToken(): int
    {
        if ($this->eof()) {
            return self::YYEOF;
        }

        if ($this->currentCharIs(self::T_WHITESPACE)) {
            $this->next();
            return $this->getNextToken();
        }

        if (($token = $this->isSingleCharToken($this->currentChar)) !== false) {
            $this->value = $this->currentChar;
            $this->next();
            return $token;
        }

        if ($this->currentCharIs(self::T_GT)) {
            $this->next();
            if ($this->currentCharIs(self::T_EQ)) {
                $this->value = '>=';
                return self::T_GTE;
            } else {
                $this->value = '>';
                return self::T_GT;
            }
        }

        if ($this->currentCharIs(self::T_LT)) {
            $this->next();
            if ($this->currentCharIs(self::T_EQ)) {
                $this->value = '<=';
                return self::T_LTE;
            } else {
                $this->value = '<';
                return self::T_LT;
            }
        }

        if (self::currentCharIs(self::T_NUMBER)) {
            $value = $this->currentChar;
            $this->next();
            while (!$this->eof()) {
                if ($this->currentCharIs(self::T_NUMBER)) {
                    $value .= $this->currentChar;
                } elseif ($this->currentCharIs(self::T_DOT)) {
                    $value .= $this->currentChar;
                } else {
                    break;
                }
                $this->next();
            }
            $this->value = $value;
            return self::T_NUMBER;
        }

        if ($this->currentCharIs(self::T_DOUBLE_QUOTE)) {
            $value = [$this->currentChar];
            $this->next();
            while (!$this->eof()) {
                $value[] = $this->currentChar;
                $this->next();
                if (
                    $this->currentCharIs(self::T_DOUBLE_QUOTE)
                    && !$this->previousCharIs(self::T_BACKSLASH)
                ) {
                    $value[] = $this->currentChar;
                    $this->next();
                    break;
                }
            }
            $this->value = implode($value);
            return self::T_USER_STRING;
        }

        // if the current token is the start of a T_STRING
        if (preg_match('/[a-zA-Z\_]/', $this->currentChar) === 1) {
            $value = $this->currentChar;
            $this->next();
            while (!$this->eof()) {
                if ($this->currentCharIs(self::T_STRING)) {
                    $value .= $this->currentChar;
                    $this->next();
                } else {
                    // $this->prev();
                    break;
                }
            }
            $this->value = $value;
            if (($reservedStringToken = $this->isReservedString($value)) !== false) {
                return $reservedStringToken;
            }
            return self::T_STRING;
        }

        if ($this->eof()) {
            return self::YYEOF;
        }

        throw new Exception("Unknown token \"$this->currentChar\" at line {$this->charLine()}");
    }

    private function charLine(): string
    {
        return "$this->line:$this->lineColumn";
    }

    private function prev(): void
    {
        if ($this->currentChar === PHP_EOL) {
            $this->line--;
        }
        $this->currentCharIndex--;
        $this->lineColumn--;
        $this->previousChar = $this->chars[$this->currentCharIndex - 1] ?? null;
        $this->currentChar = $this->chars[$this->currentCharIndex];
    }

    private function currentCharIs(int $token): bool
    {
        return $this->tokenIs($token, $this->currentChar);
    }

    private function previousCharIs(int $token): bool
    {
        return $this->tokenIs($token, $this->previousChar);
    }

    private function isReservedString(string $string): int|false
    {
        return $this->isAnyOfTokens(self::RESERVED_STRINGS, $string);
    }

    private function isSingleCharToken(?string $string): int|false
    {
        return $this->isAnyOfTokens(self::SINGLE_CHAR_TOKENS, $string);
    }

    private function isAnyOfTokens(array $tokens, ?string $string): int|false
    {
        if (is_null($string)) {
            return false;
        }
        foreach ($tokens as $token) {
            if ($this->tokenIs($token, $string)) {
                return $token;
            }
        }
        return false;
    }

    private function tokenPattern(int $token): string
    {
        return match($token) {
            self::T_STRING => '/^[a-zA-Z\_]*[a-zA-Z\_0-9]*$/',
            self::T_EQ => '/\=/',
            self::T_IDENTICAL => '/^is$/',
            self::T_NUMBER => '/^(?:\d|\d+\.\d+)$/',
            self::T_SEMICOLON => '/\;/',
            self::T_WHITESPACE => '/\s|\t/',
            self::T_EOL => '/\n|\r/',
            self::T_VAR => '/^var$/',
            self::T_EXIT => '/^exit$/',
            self::T_PLUS => '/\+/',
            self::T_MINUS => '/\-/',
            self::T_TIMES => '/\*/',
            self::T_DIV => '/\//',
            self::T_AND => '/^and$/',
            self::T_OR => '/^or$/',
            self::T_NOT => '/^not$/',
            self::T_TRUE => '/^true$/',
            self::T_FALSE => '/^false$/',
            self::T_OPEN_PARENTHESIS => '/\(/',
            self::T_CLOSE_PARENTHESIS => '/\)/',
            self::T_USER_STRING => '/\"(/w*)\"/',
            self::T_BACKSLASH => '/\\\\/',
            self::T_DOUBLE_QUOTE => '/\"/',
            self::T_COMMA => '/\,/',
            self::T_OPEN_BRACES => '/\{/',
            self::T_CLOSE_BRACES => '/\}/',
            self::T_FUN => '/^fun$/',
            self::T_RETURN => '/^return$/',
            self::T_IMPORT => '/^import$/',
            self::T_IF => '/^if$/',
            self::T_ELIF => '/^elif$/',
            self::T_ELSE => '/^else$/',
            self::T_WHILE => '/^while$/',
            self::T_BREAK => '/^break$/',
            self::T_GT => '/^>$/',
            self::T_LT => '/^<$/',
            self::T_GTE => '/^>=$/',
            self::T_LTE => '/^<=$/',
            self::T_FOR => '/^for$/',
            self::T_DOT => '/^\.$/',
            self::T_TYPE => '/^type$/',
            self::T_NEW => '/^new$/',
            default => throw new Exception("Unknown token {$token}")
        };
    }

    private function tokenIs(int $token, ?string $value): bool
    {
        return !is_null($value) && preg_match($this->tokenPattern($token), $value) === 1;
    }
}
