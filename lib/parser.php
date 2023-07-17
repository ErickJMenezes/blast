<?php
/* A Bison parser, made by GNU Bison 3.8.2.  */

/* Skeleton implementation for Bison LALR(1) parsers in PHP

   Copyright (C) 2007-2015, 2018-2021 Free Software Foundation, Inc.

   This program is free software: you can redistribute it and/or modify
   it under the terms of the GNU General Public License as published by
   the Free Software Foundation, either version 3 of the License, or
   (at your option) any later version.

   This program is distributed in the hope that it will be useful,
   but WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   GNU General Public License for more details.

   You should have received a copy of the GNU General Public License
   along with this program.  If not, see <https://www.gnu.org/licenses/>.  */

/* As a special exception, you may create a larger work that contains
   part or all of the Bison parser skeleton and distribute that work
   under terms of your choice, so long as that work isn't itself a
   parser generator using the skeleton or a modified version thereof
   as a parser skeleton.  Alternatively, if you modify or redistribute
   the parser skeleton itself, you may (at your option) remove this
   special exception, which will cause the skeleton and the resulting
   Bison output files to be licensed under the GNU General Public
   License without this special exception.

   This special exception was added by the Free Software Foundation in
   version 2.2 of Bison.  */

/* DO NOT RELY ON FEATURES THAT ARE NOT DOCUMENTED in the manual,
   especially those whose name start with YY_ or yy_.  They are
   private implementation details that can be changed or removed.  */

namespace Blast\Language;

/* First part of user prologue.  */
/* "grammar.y":1  */

use Blast\Language\Node\Expression;
use Blast\Language\Node\Statement;
use Blast\Language\Node;

/* "lib/parser.php":48  */





/**
 * A Bison parser, automatically generated from <tt>grammar.y</tt>.
 *
 * @author LALR (1) parser skeleton written by Paolo Bonzini.
 * Port to PHP language was done by Anton Sukhachev <mrsuh6@gmail.com>.
 */

 /**
   * Communication interface between the scanner and the Bison-generated
   * parser <tt>Parser</tt>.
   */
interface LexerInterface {
    /* Token kinds.  */
    /** Token "end of file", to be returned by the scanner.  */
    public const YYEOF = 0;
    /** Token error, to be returned by the scanner.  */
    public const YYerror = 256;
    /** Token "invalid token", to be returned by the scanner.  */
    public const YYUNDEF = 257;
    /** Token T_STRING, to be returned by the scanner.  */
    public const T_STRING = 258;
    /** Token T_IDENTICAL, to be returned by the scanner.  */
    public const T_IDENTICAL = 259;
    /** Token T_NUMBER, to be returned by the scanner.  */
    public const T_NUMBER = 260;
    /** Token T_WHITESPACE, to be returned by the scanner.  */
    public const T_WHITESPACE = 261;
    /** Token T_VAR, to be returned by the scanner.  */
    public const T_VAR = 262;
    /** Token T_EXIT, to be returned by the scanner.  */
    public const T_EXIT = 263;
    /** Token T_AND, to be returned by the scanner.  */
    public const T_AND = 264;
    /** Token T_OR, to be returned by the scanner.  */
    public const T_OR = 265;
    /** Token T_NOT, to be returned by the scanner.  */
    public const T_NOT = 266;
    /** Token T_TRUE, to be returned by the scanner.  */
    public const T_TRUE = 267;
    /** Token T_FALSE, to be returned by the scanner.  */
    public const T_FALSE = 268;
    /** Token T_USER_STRING, to be returned by the scanner.  */
    public const T_USER_STRING = 269;
    /** Token T_BACKSLASH, to be returned by the scanner.  */
    public const T_BACKSLASH = 270;
    /** Token T_DOUBLE_QUOTE, to be returned by the scanner.  */
    public const T_DOUBLE_QUOTE = 271;
    /** Token T_FUN, to be returned by the scanner.  */
    public const T_FUN = 272;
    /** Token T_RETURN, to be returned by the scanner.  */
    public const T_RETURN = 273;
    /** Token T_IMPORT, to be returned by the scanner.  */
    public const T_IMPORT = 274;
    /** Token T_IF, to be returned by the scanner.  */
    public const T_IF = 275;
    /** Token T_ELIF, to be returned by the scanner.  */
    public const T_ELIF = 276;
    /** Token T_ELSE, to be returned by the scanner.  */
    public const T_ELSE = 277;
    /** Token T_WHILE, to be returned by the scanner.  */
    public const T_WHILE = 278;
    /** Token T_BREAK, to be returned by the scanner.  */
    public const T_BREAK = 279;
    /** Token T_GT, to be returned by the scanner.  */
    public const T_GT = 280;
    /** Token T_LT, to be returned by the scanner.  */
    public const T_LT = 281;
    /** Token T_GTE, to be returned by the scanner.  */
    public const T_GTE = 282;
    /** Token T_LTE, to be returned by the scanner.  */
    public const T_LTE = 283;
    /** Token T_FOR, to be returned by the scanner.  */
    public const T_FOR = 284;
    /** Token T_TYPE, to be returned by the scanner.  */
    public const T_TYPE = 285;
    /** Token T_NEW, to be returned by the scanner.  */
    public const T_NEW = 286;
    /** Token T_EOL, to be returned by the scanner.  */
    public const T_EOL = 287;




    /**
     * Method to retrieve the semantic value of the last scanned token.
     * @return mixed the semantic value of the last scanned token.
     */
     public function getLVal();

    /**
     * Entry point for the scanner.  Returns the token identifier corresponding
     * to the next token and prepares to return the semantic value
     * of the token.
     * @return int the token identifier corresponding to the next token.
     */
    public function yylex(): int;

    /**
     * Emit an errorin a user-defined way.
     *
     *
     * @param string $message The string for the error message.
     */
     public function yyerror(string $message): void;


  }




  /**
   * Information needed to get the list of expected tokens and to forge
   * a syntax error diagnostic.
   */
  class Context {
    public function __construct(Parser $parser, YYStack $stack, SymbolKind $token) {
      $this->yyparser = $parser;
      $this->yystack = $stack;
      $this->yytoken = $token;
    }

    private Parser $yyparser;
    private YYStack $yystack;


    /**
     * The symbol kind of the lookahead token.
     */
    public function getToken(): SymbolKind {
      return $this->yytoken;
    }

    private SymbolKind $yytoken;
    public const NTOKENS = Parser::YYNTOKENS;

    /**
     * Put in YYARG at most YYARGN of the expected tokens given the
     * current YYCTX, and return the number of tokens stored in YYARG.  If
     * YYARG is null, return the number of expected tokens (guaranteed to
     * be less than YYNTOKENS).
     * @param SymbolKind[] $yyarg
     */
    public function getExpectedTokens(array &$yyarg, int $yyoffset, int $yyargn): int {
      $yycount = $yyoffset;
      $yyn = $this->yyparser->yypact[$this->yystack->stateAt(0)];
      if (!$this->yyparser->yyPactValueIsDefault($yyn))
        {
          /* Start YYX at -YYN if negative to avoid negative
             indexes in YYCHECK.  In other words, skip the first
             -YYN actions for this state because they are default
             actions.  */
          $yyxbegin = $yyn < 0 ? -$yyn : 0;
          /* Stay within bounds of both yycheck and yytname.  */
          $yychecklim = Parser::YYLAST - $yyn + 1;
          $yyxend = $yychecklim < self::NTOKENS ? $yychecklim : self::NTOKENS;
          for ($yyx = $yyxbegin; $yyx < $yyxend; ++$yyx)
            if ($this->yyparser->yycheck[$yyx + $yyn] === $yyx && $yyx !== SymbolKind::S_YYerror
                && !$this->yyparser->yyTableValueIsError($this->yyparser->yytable[$yyx + $yyn]))
              {
                if ($yyarg === null)
                  $yycount += 1;
                else if ($yycount === $yyargn)
                  return 0; // FIXME: this is incorrect.
                else
                  $yyarg[$yycount++] = new SymbolKind($yyx);
              }
        }
      if ($yyarg !== null && $yycount === $yyoffset && $yyoffset < $yyargn)
        $yyarg[$yycount] = null;
      return $yycount - $yyoffset;
    }
  }

  class YYStack {
    private array $stateStack = [];
    private array $valueStack = [];

    public int $height = -1;

    /**
     * @param mixed $value
     */
    public function push(int $state, $value): void {
      $this->height++;

      $this->stateStack[$this->height] = $state;
      $this->valueStack[$this->height] = $value;
    }

    public function pop(int $num = 1): void {
      $this->height -= $num;
    }

    public function &stateAt(int $i): int {
      return $this->stateStack[$this->height - $i];
    }

    /**
     * @return mixed
     */
    public function &valueAt(int $i) {
      return $this->valueStack[$this->height - $i];
    }

    // Print the state stack on the debug stream.
    public function print($resource): void {
      fputs($resource,"Stack now");
      for ($i = 0; $i <= $this->height; $i++) {
        fputs($resource, ' ' . $this->stateStack[$i]);
      }
      fputs($resource, PHP_EOL);
    }
  }


  class SymbolKind
  {
    public const S_YYEOF = 0;      /* "end of file"  */
    public const S_YYerror = 1;    /* error  */
    public const S_YYUNDEF = 2;    /* "invalid token"  */
    public const S_T_STRING = 3;   /* T_STRING  */
    public const S_T_IDENTICAL = 4; /* T_IDENTICAL  */
    public const S_T_NUMBER = 5;   /* T_NUMBER  */
    public const S_T_WHITESPACE = 6; /* T_WHITESPACE  */
    public const S_T_VAR = 7;      /* T_VAR  */
    public const S_T_EXIT = 8;     /* T_EXIT  */
    public const S_T_AND = 9;      /* T_AND  */
    public const S_T_OR = 10;      /* T_OR  */
    public const S_T_NOT = 11;     /* T_NOT  */
    public const S_T_TRUE = 12;    /* T_TRUE  */
    public const S_T_FALSE = 13;   /* T_FALSE  */
    public const S_T_USER_STRING = 14; /* T_USER_STRING  */
    public const S_T_BACKSLASH = 15; /* T_BACKSLASH  */
    public const S_T_DOUBLE_QUOTE = 16; /* T_DOUBLE_QUOTE  */
    public const S_T_FUN = 17;     /* T_FUN  */
    public const S_T_RETURN = 18;  /* T_RETURN  */
    public const S_T_IMPORT = 19;  /* T_IMPORT  */
    public const S_T_IF = 20;      /* T_IF  */
    public const S_T_ELIF = 21;    /* T_ELIF  */
    public const S_T_ELSE = 22;    /* T_ELSE  */
    public const S_T_WHILE = 23;   /* T_WHILE  */
    public const S_T_BREAK = 24;   /* T_BREAK  */
    public const S_T_GT = 25;      /* T_GT  */
    public const S_T_LT = 26;      /* T_LT  */
    public const S_T_GTE = 27;     /* T_GTE  */
    public const S_T_LTE = 28;     /* T_LTE  */
    public const S_T_FOR = 29;     /* T_FOR  */
    public const S_T_TYPE = 30;    /* T_TYPE  */
    public const S_T_NEW = 31;     /* T_NEW  */
    public const S_T_EOL = 32;     /* T_EOL  */
    public const S_33_ = 33;       /* '='  */
    public const S_34_ = 34;       /* '+'  */
    public const S_35_ = 35;       /* '-'  */
    public const S_36_ = 36;       /* '*'  */
    public const S_37_ = 37;       /* '/'  */
    public const S_38_ = 38;       /* '.'  */
    public const S_39_ = 39;       /* ';'  */
    public const S_40_ = 40;       /* '('  */
    public const S_41_ = 41;       /* ')'  */
    public const S_42_ = 42;       /* ','  */
    public const S_43_ = 43;       /* '{'  */
    public const S_44_ = 44;       /* '}'  */
    public const S_YYACCEPT = 45;  /* $accept  */
    public const S_start = 46;     /* start  */
    public const S_statement = 47; /* statement  */
    public const S_statement_list = 48; /* statement_list  */
    public const S_expression = 49; /* expression  */
    public const S_expression_node = 50; /* expression_node  */
    public const S_math_expression = 51; /* math_expression  */
    public const S_boolean_expression = 52; /* boolean_expression  */
    public const S_variable = 53;  /* variable  */
    public const S_property_fetch = 54; /* property_fetch  */
    public const S_function_call_args = 55; /* function_call_args  */
    public const S_function_call = 56; /* function_call  */
    public const S_variable_declaration = 57; /* variable_declaration  */
    public const S_assignment_expression = 58; /* assignment_expression  */
    public const S_exit = 59;      /* exit  */
    public const S_fun_param = 60; /* fun_param  */
    public const S_fun_param_list = 61; /* fun_param_list  */
    public const S_fun_declaration = 62; /* fun_declaration  */
    public const S_fun_expression = 63; /* fun_expression  */
    public const S_return = 64;    /* return  */
    public const S_base_if_statement = 65; /* base_if_statement  */
    public const S_else_if_statement = 66; /* else_if_statement  */
    public const S_multi_else_if_statement = 67; /* multi_else_if_statement  */
    public const S_else_statement = 68; /* else_statement  */
    public const S_if_statement = 69; /* if_statement  */
    public const S_for_init_expression = 70; /* for_init_expression  */
    public const S_for_condition = 71; /* for_condition  */
    public const S_for_update_expression = 72; /* for_update_expression  */
    public const S_for_statement = 73; /* for_statement  */
    public const S_while_statement = 74; /* while_statement  */
    public const S_import = 75;    /* import  */
    public const S_type_body = 76; /* type_body  */
    public const S_type_declaration = 77; /* type_declaration  */
    public const S_new_object = 78; /* new_object  */


    private int $yycode;

    public function __construct(int $yycode) {
      $this->yycode = $yycode;
    }

    public function getCode(): int {
        return $this->yycode;
    }


    private const NAMES = array("\"end of file\"", "error", "\"invalid token\"", "T_STRING",
  "T_IDENTICAL", "T_NUMBER", "T_WHITESPACE", "T_VAR", "T_EXIT", "T_AND",
  "T_OR", "T_NOT", "T_TRUE", "T_FALSE", "T_USER_STRING", "T_BACKSLASH",
  "T_DOUBLE_QUOTE", "T_FUN", "T_RETURN", "T_IMPORT", "T_IF", "T_ELIF",
  "T_ELSE", "T_WHILE", "T_BREAK", "T_GT", "T_LT", "T_GTE", "T_LTE",
  "T_FOR", "T_TYPE", "T_NEW", "T_EOL", "'='", "'+'", "'-'", "'*'", "'/'",
  "'.'", "';'", "'('", "')'", "','", "'{'", "'}'", "\$accept", "start",
  "statement", "statement_list", "expression", "expression_node",
  "math_expression", "boolean_expression", "variable", "property_fetch",
  "function_call_args", "function_call", "variable_declaration",
  "assignment_expression", "exit", "fun_param", "fun_param_list",
  "fun_declaration", "fun_expression", "return", "base_if_statement",
  "else_if_statement", "multi_else_if_statement", "else_statement",
  "if_statement", "for_init_expression", "for_condition",
  "for_update_expression", "for_statement", "while_statement", "import",
  "type_body", "type_declaration", "new_object", null);

    public function getName(): string {
        return trim(self::NAMES[$this->yycode], '"\'');
    }

  }




class Parser
{
  /** Version number for the Bison executable that generated this parser.  */
  public const BISON_VERSION = "3.8.2";

  /** Name of the skeleton that generated this parser.  */
  public const BISON_SKELETON = "vendor/mrsuh/php-bison-skeleton/src/php-skel.m4";

/* "%code parser" blocks.  */
/* "grammar.y":10  */

    private Node $ast;
    public function setAst(Node $ast): void { $this->ast = $ast; }
    public function getAst(): Node { return $this->ast; }

/* "lib/parser.php":405  */






  /**
   * The object doing lexical analysis for us.
   */
  private LexerInterface $yylexer;




  /**
   * Instantiates the Bison-generated parser.
   * @param LexerInterface $lexer The scanner that will supply tokens to the parser.
   */
  public function __construct(LexerInterface $lexer)
  {

    $this->yylexer = $lexer;
    $this->yystack          = new YYStack();
    

  }




  private int $yynerrs = 0;

  /**
   * The number of syntax errors so far.
   */
  public function getNumberOfErrors(): int { return $this->yynerrs; }

  /**
   * Print an error message via the lexer.
   *
   * @param msg The error message.
   */
  public function yyerror(string $msg): void {
      $this->yylexer->yyerror($msg);
  }


  /**
   * Returned by a Bison action in order to stop the parsing process and
   * return success (<tt>true</tt>).
   */
  public const YYACCEPT = 0;

  /**
   * Returned by a Bison action in order to stop the parsing process and
   * return failure (<tt>false</tt>).
   */
  public const YYABORT = 1;



  /**
   * Returned by a Bison action in order to start error recovery without
   * printing an error message.
   */
  public const YYERROR = 2;

  /**
   * Internal return codes that are not supported for user semantic
   * actions.
   */
  private const YYERRLAB = 3;
  private const YYNEWSTATE = 4;
  private const YYDEFAULT = 5;
  private const YYREDUCE = 6;
  private const YYERRLAB1 = 7;
  private const YYRETURN = 8;


  private int $yyerrstatus = 0;

    /**
     * Lookahead token kind.
     */
    private int $yychar = Parser::YYEMPTY;
    /**
     * Lookahead symbol kind.
     */
    private ?SymbolKind $yytoken = null;

    /* State.  */
    private int $yyn     = 0;
    private int $yylen   = 0;
    private int $yystate = 0;
    private YYStack $yystack;
    private int $label = Parser::YYNEWSTATE;



    /**
     * Semantic value of the lookahead.
     * @var mixed
     */
    private $yylval = null;

  /**
   * Whether error recovery is being done.  In this state, the parser
   * reads token until it reaches a known state, and then restarts normal
   * operation.
   */
  public function recovering(): bool
  {
    return $this->yyerrstatus === 0;
  }

  /** Compute post-reduction state.
   * @param yystate   the current state
   * @param yysym     the nonterminal to push on the stack
   */
  private function yyLRGotoState(int $yystate, int $yysym): int {

    $yyr = $this->yypgoto[$yysym - Parser::YYNTOKENS] + $yystate;
    if (0 <= $yyr && $yyr <= Parser::YYLAST && $this->yycheck[$yyr] === $yystate)
      return $this->yytable[$yyr];
    else
      return $this->yydefgoto[$yysym - Parser::YYNTOKENS];
  }

  private function yyaction(int $yyn, YYStack $yystack, int $yylen): int
  {
    /* If YYLEN is nonzero, implement the default value of the action:
       '$$ = $1'.  Otherwise, use the top of the stack.

       Otherwise, the following line sets YYVAL to garbage.
       This behavior is undocumented and Bison
       users should not rely upon it.  */
     /** @var mixed $yyval */
     $yyval = (0 < $yylen) ? $yystack->valueAt($yylen - 1) : $yystack->valueAt(0);

    switch ($yyn)
      {
          case 2: /* start: statement_list  */
    /* "grammar.y":58  */
                                                                                        { self::setAst(new Statement\StatementList($yystack->valueAt(0))); };
  break;


  case 3: /* statement: variable_declaration  */
    /* "grammar.y":62  */
                                                                        { $yyval = $yystack->valueAt(0); };
  break;


  case 4: /* statement: exit  */
    /* "grammar.y":63  */
                                                                                                { $yyval = $yystack->valueAt(0); };
  break;


  case 5: /* statement: expression ';'  */
    /* "grammar.y":64  */
                                                                                        { $yyval = $yystack->valueAt(1); };
  break;


  case 6: /* statement: fun_declaration  */
    /* "grammar.y":65  */
                                                                                        { $yyval = $yystack->valueAt(0); };
  break;


  case 7: /* statement: return  */
    /* "grammar.y":66  */
                                                                                                { $yyval = $yystack->valueAt(0); };
  break;


  case 8: /* statement: if_statement  */
    /* "grammar.y":67  */
                                                                                        { $yyval = $yystack->valueAt(0); };
  break;


  case 9: /* statement: for_statement  */
    /* "grammar.y":68  */
                                                                                        { $yyval = $yystack->valueAt(0); };
  break;


  case 10: /* statement: while_statement  */
    /* "grammar.y":69  */
                                                                                        { $yyval = $yystack->valueAt(0); };
  break;


  case 11: /* statement: import  */
    /* "grammar.y":70  */
                                                                                                { $yyval = $yystack->valueAt(0); };
  break;


  case 12: /* statement: type_declaration  */
    /* "grammar.y":71  */
                                                                                        { $yyval = $yystack->valueAt(0); };
  break;


  case 13: /* statement_list: %empty  */
    /* "grammar.y":74  */
                                                                                        { $yyval = []; };
  break;


  case 14: /* statement_list: statement_list statement  */
    /* "grammar.y":75  */
                                                                                { $yyval = [...$yystack->valueAt(1), $yystack->valueAt(0)];  };
  break;


  case 15: /* expression: T_NUMBER  */
    /* "grammar.y":79  */
                                                                                { $yyval = new Expression\NumberNode($yystack->valueAt(0)); };
  break;


  case 16: /* expression: T_USER_STRING  */
    /* "grammar.y":80  */
                                                                                { $yyval = new Expression\StringNode($yystack->valueAt(0)); };
  break;


  case 17: /* expression: T_TRUE  */
    /* "grammar.y":81  */
                                                                                { $yyval = new Expression\BooleanNode($yystack->valueAt(0)); };
  break;


  case 18: /* expression: T_FALSE  */
    /* "grammar.y":82  */
                                                                                { $yyval = new Expression\BooleanNode($yystack->valueAt(0)); };
  break;


  case 19: /* expression: math_expression  */
    /* "grammar.y":83  */
                                                                                        { $yyval = $yystack->valueAt(0); };
  break;


  case 20: /* expression: boolean_expression  */
    /* "grammar.y":84  */
                                                                                        { $yyval = $yystack->valueAt(0); };
  break;


  case 21: /* expression: variable  */
    /* "grammar.y":85  */
                                                                                                { $yyval = $yystack->valueAt(0); };
  break;


  case 22: /* expression: property_fetch  */
    /* "grammar.y":86  */
                                                                                        { $yyval = $yystack->valueAt(0); };
  break;


  case 23: /* expression: fun_expression  */
    /* "grammar.y":87  */
                                                                                        { $yyval = $yystack->valueAt(0); };
  break;


  case 24: /* expression: function_call  */
    /* "grammar.y":88  */
                                                                                        { $yyval = $yystack->valueAt(0); };
  break;


  case 25: /* expression: new_object  */
    /* "grammar.y":89  */
                                                                                                { $yyval = $yystack->valueAt(0); };
  break;


  case 26: /* expression: assignment_expression  */
    /* "grammar.y":90  */
                                                                                { $yyval = $yystack->valueAt(0); };
  break;


  case 28: /* expression_node: '(' expression ')'  */
    /* "grammar.y":96  */
                                                                                        { $yyval = new Expression\ExpressionNode([$yystack->valueAt(1)]); };
  break;


  case 29: /* math_expression: expression '+' expression  */
    /* "grammar.y":100  */
                                                                                { $yyval = new Expression\MathExpression($yystack->valueAt(1), [$yystack->valueAt(2), $yystack->valueAt(0)]); };
  break;


  case 30: /* math_expression: expression '-' expression  */
    /* "grammar.y":101  */
                                                                                { $yyval = new Expression\MathExpression($yystack->valueAt(1), [$yystack->valueAt(2), $yystack->valueAt(0)]); };
  break;


  case 31: /* math_expression: expression '*' expression  */
    /* "grammar.y":102  */
                                                                                { $yyval = new Expression\MathExpression($yystack->valueAt(1), [$yystack->valueAt(2), $yystack->valueAt(0)]); };
  break;


  case 32: /* math_expression: expression '/' expression  */
    /* "grammar.y":103  */
                                                                                { $yyval = new Expression\MathExpression($yystack->valueAt(1), [$yystack->valueAt(2), $yystack->valueAt(0)]); };
  break;


  case 33: /* math_expression: expression '+' '+'  */
    /* "grammar.y":105  */
                                                                                        { $yyval = new Expression\PostIncrement([$yystack->valueAt(2)]); };
  break;


  case 34: /* math_expression: '+' '+' expression  */
    /* "grammar.y":106  */
                                                                                        { $yyval = new Expression\PreIncrement([$yystack->valueAt(0)]); };
  break;


  case 35: /* math_expression: expression '-' '-'  */
    /* "grammar.y":108  */
                                                                                        { $yyval = new Expression\PostDecrement([$yystack->valueAt(2)]); };
  break;


  case 36: /* math_expression: '-' '-' expression  */
    /* "grammar.y":109  */
                                                                                        { $yyval = new Expression\PreDecrement([$yystack->valueAt(0)]); };
  break;


  case 37: /* math_expression: expression '*' '*'  */
    /* "grammar.y":111  */
                                                                                        { $yyval = new Expression\PostPower([$yystack->valueAt(2)]); };
  break;


  case 38: /* math_expression: '*' '*' expression  */
    /* "grammar.y":112  */
                                                                                        { $yyval = new Expression\PrePower([$yystack->valueAt(0)]); };
  break;


  case 39: /* boolean_expression: expression T_GT expression  */
    /* "grammar.y":116  */
                                                                                { $yyval = new Expression\BooleanExpression($yystack->valueAt(1), [$yystack->valueAt(2), $yystack->valueAt(0)]); };
  break;


  case 40: /* boolean_expression: expression T_GTE expression  */
    /* "grammar.y":117  */
                                                                                { $yyval = new Expression\BooleanExpression($yystack->valueAt(1), [$yystack->valueAt(2), $yystack->valueAt(0)]); };
  break;


  case 41: /* boolean_expression: expression T_LT expression  */
    /* "grammar.y":118  */
                                                                                { $yyval = new Expression\BooleanExpression($yystack->valueAt(1), [$yystack->valueAt(2), $yystack->valueAt(0)]); };
  break;


  case 42: /* boolean_expression: expression T_LTE expression  */
    /* "grammar.y":119  */
                                                                                { $yyval = new Expression\BooleanExpression($yystack->valueAt(1), [$yystack->valueAt(2), $yystack->valueAt(0)]); };
  break;


  case 43: /* boolean_expression: expression T_IDENTICAL expression  */
    /* "grammar.y":120  */
                                                                        { $yyval = new Expression\BooleanExpression($yystack->valueAt(1), [$yystack->valueAt(2), $yystack->valueAt(0)]); };
  break;


  case 44: /* boolean_expression: expression T_AND expression  */
    /* "grammar.y":122  */
                                                                                { $yyval = new Expression\BooleanExpression($yystack->valueAt(1), [$yystack->valueAt(2), $yystack->valueAt(0)]); };
  break;


  case 45: /* boolean_expression: expression T_OR expression  */
    /* "grammar.y":123  */
                                                                                { $yyval = new Expression\BooleanExpression($yystack->valueAt(1), [$yystack->valueAt(2), $yystack->valueAt(0)]); };
  break;


  case 46: /* boolean_expression: T_NOT expression  */
    /* "grammar.y":125  */
                                                                                        { $yyval = new Expression\BooleanNegationExpression([$yystack->valueAt(0)]); };
  break;


  case 47: /* variable: T_STRING  */
    /* "grammar.y":129  */
                                                                                                { $yyval = new Expression\VariableFetch($yystack->valueAt(0)); };
  break;


  case 48: /* property_fetch: expression '.' variable  */
    /* "grammar.y":133  */
                                                                                { $yyval = new Expression\PropertyFetch($yystack->valueAt(2), $yystack->valueAt(0)); };
  break;


  case 49: /* function_call_args: %empty  */
    /* "grammar.y":136  */
                                                                                        { $yyval = []; };
  break;


  case 50: /* function_call_args: expression  */
    /* "grammar.y":137  */
                                                                                                { $yyval = [$yystack->valueAt(0)]; };
  break;


  case 51: /* function_call_args: function_call_args ',' expression  */
    /* "grammar.y":138  */
                                                                        { $yyval = [...$yystack->valueAt(2), $yystack->valueAt(0)]; };
  break;


  case 52: /* function_call: variable '(' function_call_args ')'  */
    /* "grammar.y":142  */
                                                                        { $yyval = new Expression\FunctionCall($yystack->valueAt(3), $yystack->valueAt(1)); };
  break;


  case 53: /* function_call: property_fetch '(' function_call_args ')'  */
    /* "grammar.y":143  */
                                                                { $yyval = new Expression\FunctionCall($yystack->valueAt(3), $yystack->valueAt(1)); };
  break;


  case 54: /* function_call: expression_node '(' function_call_args ')'  */
    /* "grammar.y":144  */
                                                                { $yyval = new Expression\FunctionCall($yystack->valueAt(3), $yystack->valueAt(1)); };
  break;


  case 55: /* function_call: function_call '(' function_call_args ')'  */
    /* "grammar.y":145  */
                                                                { $yyval = new Expression\FunctionCall($yystack->valueAt(3), $yystack->valueAt(1)); };
  break;


  case 56: /* variable_declaration: T_VAR T_STRING ';'  */
    /* "grammar.y":149  */
                                                        { $yyval = new Statement\VariableDeclaration($yystack->valueAt(1)); };
  break;


  case 57: /* variable_declaration: T_VAR T_STRING '=' expression ';'  */
    /* "grammar.y":150  */
                                                                { $yyval = new Statement\VariableDeclaration($yystack->valueAt(3), $yystack->valueAt(1)); };
  break;


  case 58: /* assignment_expression: variable '=' expression  */
    /* "grammar.y":154  */
                                                                                { $yyval = new Expression\AssignmentExpression($yystack->valueAt(2), $yystack->valueAt(0)); };
  break;


  case 59: /* assignment_expression: property_fetch '=' expression  */
    /* "grammar.y":155  */
                                                                        { $yyval = new Expression\AssignmentExpression($yystack->valueAt(2), $yystack->valueAt(0)); };
  break;


  case 60: /* exit: T_EXIT ';'  */
    /* "grammar.y":159  */
                                                                                                { $yyval = new Statement\ExitStatement(); };
  break;


  case 61: /* exit: T_EXIT expression ';'  */
    /* "grammar.y":160  */
                                                                                { $yyval = new Statement\ExitStatement($yystack->valueAt(1)); };
  break;


  case 62: /* fun_param: T_STRING  */
    /* "grammar.y":164  */
                                                                        { $yyval = new Statement\VariableDeclaration($yystack->valueAt(0)); };
  break;


  case 63: /* fun_param: T_STRING ','  */
    /* "grammar.y":165  */
                                                                        { $yyval = new Statement\VariableDeclaration($yystack->valueAt(1)); };
  break;


  case 64: /* fun_param: T_STRING '=' expression  */
    /* "grammar.y":166  */
                                                                        { $yyval = new Statement\VariableDeclaration($yystack->valueAt(2), $yystack->valueAt(0)); };
  break;


  case 65: /* fun_param: T_STRING '=' expression ','  */
    /* "grammar.y":167  */
                                                                { $yyval = new Statement\VariableDeclaration($yystack->valueAt(3), $yystack->valueAt(1)); };
  break;


  case 66: /* fun_param_list: %empty  */
    /* "grammar.y":170  */
                                                                                        { $yyval = []; };
  break;


  case 67: /* fun_param_list: fun_param_list fun_param  */
    /* "grammar.y":171  */
                                                                                { $yyval = [...$yystack->valueAt(1), $yystack->valueAt(0)]; };
  break;


  case 68: /* fun_declaration: T_FUN T_STRING '(' fun_param_list ')' '{' statement_list '}'  */
    /* "grammar.y":175  */
                                                                        { $yyval = new Statement\FunctionDeclaration($yystack->valueAt(6), $yystack->valueAt(4), $yystack->valueAt(1)); };
  break;


  case 69: /* fun_expression: T_FUN '(' fun_param_list ')' '{' statement_list '}'  */
    /* "grammar.y":179  */
                                                                                        { $yyval = new Expression\FunctionExpression($yystack->valueAt(4), $yystack->valueAt(1)); };
  break;


  case 70: /* return: T_RETURN ';'  */
    /* "grammar.y":183  */
                                                                                        { $yyval = new Statement\ReturnStatement(); };
  break;


  case 71: /* return: T_RETURN expression ';'  */
    /* "grammar.y":184  */
                                                                                { $yyval = new Statement\ReturnStatement($yystack->valueAt(1)); };
  break;


  case 72: /* base_if_statement: T_IF '(' expression ')' '{' statement_list '}'  */
    /* "grammar.y":188  */
                                                        { $yyval = new Statement\IfStatement($yystack->valueAt(4), $yystack->valueAt(1)); };
  break;


  case 73: /* else_if_statement: T_ELIF '(' expression ')' '{' statement_list '}'  */
    /* "grammar.y":192  */
                                                                                        { $yyval = new Statement\ElseIfStatement($yystack->valueAt(4), $yystack->valueAt(1)); };
  break;


  case 74: /* multi_else_if_statement: %empty  */
    /* "grammar.y":195  */
                                                                                { $yyval = []; };
  break;


  case 75: /* multi_else_if_statement: multi_else_if_statement else_if_statement  */
    /* "grammar.y":196  */
                                                                { $yyval = [...$yystack->valueAt(1), $yystack->valueAt(0)]; };
  break;


  case 76: /* else_statement: T_ELSE '{' statement_list '}'  */
    /* "grammar.y":200  */
                                                                        { $yyval = new Statement\ElseStatement($yystack->valueAt(1)); };
  break;


  case 77: /* if_statement: base_if_statement  */
    /* "grammar.y":204  */
                                                                                                                        { $yyval = $yystack->valueAt(0); };
  break;


  case 78: /* if_statement: base_if_statement multi_else_if_statement else_statement  */
    /* "grammar.y":205  */
                                                                                { $yyval = new Statement\IfStatement($yystack->valueAt(2)->condition, $yystack->valueAt(2)->children, $yystack->valueAt(1), $yystack->valueAt(0)); };
  break;


  case 79: /* for_init_expression: ';'  */
    /* "grammar.y":209  */
                                                        { $yyval = null; };
  break;


  case 80: /* for_init_expression: variable_declaration  */
    /* "grammar.y":210  */
                                { $yyval = $yystack->valueAt(0); };
  break;


  case 81: /* for_init_expression: expression ';'  */
    /* "grammar.y":211  */
                                        { $yyval = $yystack->valueAt(1); };
  break;


  case 82: /* for_condition: ';'  */
    /* "grammar.y":215  */
                                        { $yyval = null; };
  break;


  case 83: /* for_condition: expression ';'  */
    /* "grammar.y":216  */
                        { $yyval = $yystack->valueAt(1); };
  break;


  case 84: /* for_update_expression: ';'  */
    /* "grammar.y":220  */
                                                        { $yyval = null; };
  break;


  case 85: /* for_update_expression: expression  */
    /* "grammar.y":221  */
                                                { $yyval = $yystack->valueAt(0); };
  break;


  case 86: /* for_statement: T_FOR '(' for_init_expression for_condition for_update_expression ')' '{' statement_list '}'  */
    /* "grammar.y":225  */
                                                                                                                { $yyval = new Statement\ForStatement($yystack->valueAt(6), $yystack->valueAt(5), $yystack->valueAt(4), $yystack->valueAt(1)); };
  break;


  case 87: /* while_statement: T_WHILE '(' expression ')' '{' statement_list '}'  */
    /* "grammar.y":229  */
                                                                                                                                                                { $yyval = new Statement\WhileStatement($yystack->valueAt(4), $yystack->valueAt(1)); };
  break;


  case 88: /* import: T_IMPORT T_USER_STRING ';'  */
    /* "grammar.y":233  */
                                                        { $yyval = new Statement\ImportStatement($yystack->valueAt(2)); };
  break;


  case 89: /* type_body: %empty  */
    /* "grammar.y":236  */
                                                                { $yyval = []; };
  break;


  case 90: /* type_body: type_body variable_declaration  */
    /* "grammar.y":237  */
                                        { $yyval = [...$yystack->valueAt(1), $yystack->valueAt(0)]; };
  break;


  case 91: /* type_body: type_body fun_declaration  */
    /* "grammar.y":238  */
                                                { $yyval = [...$yystack->valueAt(1), $yystack->valueAt(0)]; };
  break;


  case 92: /* type_declaration: T_TYPE T_STRING '{' type_body '}'  */
    /* "grammar.y":242  */
                                                        { $yyval = new Statement\TypeDeclarationStatement($yystack->valueAt(3), $yystack->valueAt(1)); };
  break;


  case 93: /* new_object: T_NEW T_STRING '(' function_call_args ')'  */
    /* "grammar.y":246  */
                                                        { $yyval = new Expression\NewObjectExpression($yystack->valueAt(3), $yystack->valueAt(1)); };
  break;



/* "lib/parser.php":1094  */

        default: break;
      }

    $yystack->pop($yylen);
    $yylen = 0;
    /* Shift the result of the reduction.  */
    $yystate = $this->yyLRGotoState($yystack->stateAt(0), $this->yyr1[$yyn]);
    $yystack->push($yystate, $yyval);
    return Parser::YYNEWSTATE;
  }




  /**
   * Parse input from the scanner that was specified at object construction
   * time.  Return whether the end of the input was reached successfully.
   *
   * @return <tt>true</tt> if the parsing succeeds.  Note that this does not
   *          imply that there were no syntax errors.
   */
  public function parse(): bool 

  {




    $this->yyerrstatus = 0;
    $this->yynerrs = 0;

    /* Initialize the stack.  */
    $this->yystack->push($this->yystate, $this->yylval);



    for (;;)
      switch ($this->label)
      {
        /* New state.  Unlike in the C/C++ skeletons, the state is already
           pushed when we come here.  */
      case Parser::YYNEWSTATE:

        /* Accept?  */
        if ($this->yystate === Parser::YYFINAL) {
          return true;
        }

        /* Take a decision.  First try without lookahead.  */
        $this->yyn = $this->yypact[$this->yystate];
        if ($this->yyPactValueIsDefault($this->yyn))
          {
            $this->label = Parser::YYDEFAULT;
            break;
          }

        /* Read a lookahead token.  */
        if ($this->yychar === Parser::YYEMPTY)
          {

            $this->yychar = $this->yylexer->yylex();
            $this->yylval = $this->yylexer->getLVal();

          }

        /* Convert token to internal form.  */
        $this->yytoken = $this->yytranslate($this->yychar);

        if ($this->yytoken->getCode() === SymbolKind::S_YYerror)
          {
            // The scanner already issued an error message, process directly
            // to error recovery.  But do not keep the error token as
            // lookahead, it is too special and may lead us to an endless
            // loop in error recovery. */
            $this->yychar = LexerInterface::YYUNDEF;
            $this->yytoken = new SymbolKind(SymbolKind::S_YYUNDEF);
            $this->label = Parser::YYERRLAB1;
          }
        else
          {
            /* If the proper action on seeing token YYTOKEN is to reduce or to
               detect an error, take that action.  */
            $this->yyn += $this->yytoken->getCode();
            if ($this->yyn < 0 || Parser::YYLAST < $this->yyn || $this->yycheck[$this->yyn] !== $this->yytoken->getCode()) {
              $this->label = Parser::YYDEFAULT;
            }

            /* <= 0 means reduce or error.  */
            else if (($this->yyn = $this->yytable[$this->yyn]) <= 0)
              {
                if ($this->yyTableValueIsError($this->yyn)) {
                  $this->label = Parser::YYERRLAB;
                } else {
                  $this->yyn = -$this->yyn;
                  $this->label = Parser::YYREDUCE;
                }
              }

            else
              {
                /* Shift the lookahead token.  */
                /* Discard the token being shifted.  */
                $this->yychar = Parser::YYEMPTY;

                /* Count tokens shifted since error; after three, turn off error
                   status.  */
                if ($this->yyerrstatus > 0)
                  --$this->yyerrstatus;

                $this->yystate = $this->yyn;
                $this->yystack->push($this->yystate, $this->yylval);
                $this->label = Parser::YYNEWSTATE;
              }
          }
        break;

      /*-----------------------------------------------------------.
      | yydefault -- do the default action for the current state.  |
      `-----------------------------------------------------------*/
      case Parser::YYDEFAULT:
        $this->yyn = $this->yydefact[$this->yystate];
        if ($this->yyn === 0)
          $this->label = Parser::YYERRLAB;
        else
          $this->label = Parser::YYREDUCE;
        break;

      /*-----------------------------.
      | yyreduce -- Do a reduction.  |
      `-----------------------------*/
      case Parser::YYREDUCE:
        $this->yylen = $this->yyr2[$this->yyn];
        $this->label = $this->yyaction($this->yyn, $this->yystack, $this->yylen);
        $this->yystate = $this->yystack->stateAt(0);
        break;

      /*------------------------------------.
      | yyerrlab -- here on detecting error |
      `------------------------------------*/
      case Parser::YYERRLAB:
        /* If not already recovering from an error, report this error.  */
        if ($this->yyerrstatus === 0)
          {
            ++$this->yynerrs;
            if ($this->yychar === Parser::YYEMPTY) {
              $this->yytoken = null;
            }
            $this->yyreportSyntaxError(new Context($this, $this->yystack, $this->yytoken));
          }

        if ($this->yyerrstatus === 3)
          {
            /* If just tried and failed to reuse lookahead token after an
               error, discard it.  */

            if ($this->yychar <= LexerInterface::YYEOF)
              {
                /* Return failure if at end of input.  */
                if ($this->yychar === LexerInterface::YYEOF) {
                  return false;
                }
              }
            else
              $this->yychar = Parser::YYEMPTY;
          }

        /* Else will try to reuse lookahead token after shifting the error
           token.  */
        $this->label = Parser::YYERRLAB1;
        break;

      /*-------------------------------------------------.
      | errorlab -- error raised explicitly by YYERROR.  |
      `-------------------------------------------------*/
      case Parser::YYERROR:
        /* Do not reclaim the symbols of the rule which action triggered
           this YYERROR.  */
        $this->yystack->pop($this->yylen);
        $this->yylen = 0;
        $this->yystate = $this->yystack->stateAt(0);
        $this->label = Parser::YYERRLAB1;
        break;

      /*-------------------------------------------------------------.
      | yyerrlab1 -- common code for both syntax error and YYERROR.  |
      `-------------------------------------------------------------*/
      case Parser::YYERRLAB1:
        $this->yyerrstatus = 3;       /* Each real token shifted decrements this.  */

        // Pop stack until we find a state that shifts the error token.
        for (;;)
          {
            $this->yyn = $this->yypact[$this->yystate];
            if (!$this->yyPactValueIsDefault($this->yyn))
              {
                $this->yyn += SymbolKind::S_YYerror;
                if (0 <= $this->yyn && $this->yyn <= Parser::YYLAST
                    && $this->yycheck[$this->yyn] === SymbolKind::S_YYerror)
                  {
                    $this->yyn = $this->yytable[$this->yyn];
                    if (0 < $this->yyn)
                      break;
                  }
              }

            /* Pop the current state because it cannot handle the
             * error token.  */
            if ($this->yystack->height === 0) {
              return false;
            }


            $this->yystack->pop();
            $this->yystate = $this->yystack->stateAt(0);
          }

        if ($this->label === Parser::YYABORT)
          /* Leave the switch.  */
          break;



        /* Shift the error token.  */

        $this->yystate = $this->yyn;
        $this->yystack->push($this->yyn, $this->yylval);
        $this->label = Parser::YYNEWSTATE;
        break;

        /* Accept.  */
      case Parser::YYACCEPT:
        return true;

        /* Abort.  */
      case Parser::YYABORT:
        return false;
      }
}








  /**
   * Build and emit a "syntax error" message in a user-defined way.
   *
   * @param ctx  The context of the error.
   */
  private function yyreportSyntaxError(Context $yyctx): void {
      $this->yyerror("syntax error");
  }

  /**
   * Whether the given <code>yypact_</code> value indicates a defaulted state.
   * @param yyvalue   the value to check
   */
  public function yyPactValueIsDefault(int $yyvalue): bool {
    return $yyvalue === $this->yypact_ninf;
  }

  /**
   * Whether the given <code>yytable_</code>
   * value indicates a syntax error.
   * @param yyvalue the value to check
   */
  public function yyTableValueIsError(int $yyvalue): bool {
    return $yyvalue === $this->yytable_ninf;
  }

  public int $yypact_ninf = -56;
  public int $yytable_ninf = -75;

/* YYPACT[STATE-NUM] -- Index in YYTABLE of the portion describing
   STATE-NUM.  */
  
  /** @var int[] */
  public array $yypact = array(   -56,    10,   329,   -56,   -56,   -56,    36,   376,   592,   -56,
     -56,   -56,    29,   414,    27,    16,    28,    44,    43,    91,
      66,    78,    81,   592,   -56,   668,    82,   -56,   -56,   -12,
       5,    83,   -56,   -56,   -56,   -56,   -56,   -56,    59,   -56,
     -56,   -56,   -56,   -56,   -56,     4,    84,   -56,   704,    63,
      86,   -56,   -56,   724,    79,   592,   592,   363,    87,    88,
     592,   592,   592,   430,   592,   592,   592,   592,   592,   592,
     592,   605,   639,   652,   592,   124,   -56,   592,   592,   592,
     592,   592,   592,    61,   592,   -56,   -56,   -56,     1,   -56,
     -56,   465,   485,   -56,   744,   -56,   522,   -56,   592,   839,
     839,   358,   -56,    13,    63,   824,    13,    13,    13,    13,
     -56,   839,   -56,   839,   -56,   358,   358,   -56,   804,   -15,
     804,    45,   804,    65,    68,    93,    92,   -56,   -56,   764,
       6,    -9,    95,   -56,   100,   106,   -56,   -56,   784,   535,
       8,    70,   -56,   592,   -56,   -56,   -56,   592,   -56,   -56,
     107,   592,   -56,   -56,   -56,   -56,   -56,   -56,   804,    90,
     131,   -56,   -56,   -56,   -56,   804,   555,     0,   -56,   293,
      85,   134,   168,   112,   113,   -56,   202,   -56,   -56,   -56,
     -56,   -56,   -56,   -56,   236,   270,   -56,   -56);
  

/* YYDEFACT[STATE-NUM] -- Default reduction number in state STATE-NUM.
   Performed when YYTABLE does not specify something else to do.  Zero
   means the default is an error.  */
  
  /** @var int[] */
  public array $yydefact = array(    13,     0,     2,     1,    47,    15,     0,     0,     0,    17,
      18,    16,     0,     0,     0,     0,     0,     0,     0,     0,
       0,     0,     0,     0,    14,     0,    27,    19,    20,    21,
      22,    24,     3,    26,     4,     6,    23,     7,    77,     8,
       9,    10,    11,    12,    25,     0,     0,    60,     0,    46,
       0,    66,    70,     0,     0,     0,     0,     0,     0,     0,
       0,     0,     0,     0,     0,     0,     0,     0,     0,     0,
       0,     0,     0,     0,     0,     0,     5,    49,     0,    49,
       0,    49,    49,     0,     0,    56,    61,    66,     0,    71,
      88,     0,     0,    79,     0,    80,     0,    89,    49,    34,
      36,    38,    28,    43,    44,    45,    39,    41,    40,    42,
      33,    29,    35,    30,    37,    31,    32,    48,    50,     0,
      58,     0,    59,     0,     0,     0,     0,    75,    78,     0,
       0,    62,     0,    67,     0,     0,    81,    82,     0,     0,
       0,     0,    54,     0,    52,    53,    55,     0,    13,    57,
       0,     0,    63,    13,    13,    13,    83,    84,    85,     0,
       0,    92,    90,    91,    93,    51,     0,     0,    13,    64,
       0,     0,     0,     0,     0,    76,     0,    65,    69,    72,
      87,    13,    13,    68,     0,     0,    86,    73);
  

/* YYPGOTO[NTERM-NUM].  */
  
  /** @var int[] */
  public array $yypgoto = array(   -56,   -56,   -56,   361,    -7,   -56,   -56,   -56,    97,   -56,
      -3,   -56,   -55,   -56,   -56,   -56,    71,    19,   -56,   -56,
     -56,   -56,   -56,   -56,   -56,   -56,   -56,   -56,   -56,   -56,
     -56,   -56,   -56,   -56);
  

/* YYDEFGOTO[NTERM-NUM].  */
  
  /** @var int[] */
  public array $yydefgoto = array(     0,     1,    24,     2,    25,    26,    27,    28,    29,    30,
     119,    31,    32,    33,    34,   133,    88,    35,    36,    37,
      38,   127,    83,   128,    39,    96,   139,   159,    40,    41,
      42,   140,    43,    44);
  

/* YYTABLE[YYPACT[STATE-NUM]] -- What to do in state STATE-NUM.  If
   positive, shift that token.  If negative, reduce the rule whose
   number is the opposite.  If YYTABLE_NINF, syntax error.  */
  
  /** @var int[] */
  public array $yytable = array(    48,    49,    95,     4,   131,     5,    53,     6,     7,   131,
       3,     8,     9,    10,    11,     6,    63,    12,    13,    14,
      15,    78,    65,    16,   151,   160,   142,   143,    79,    17,
      18,    19,    50,   152,    20,    21,    22,    84,    80,    45,
      23,    54,   132,    85,   175,    81,    58,   150,    91,    92,
      94,    75,   161,    99,   100,   101,    55,   103,   104,   105,
     106,   107,   108,   109,   111,   113,   115,   116,    56,    51,
     118,   120,   118,   122,   118,   118,   121,   129,   123,   124,
     -74,   -74,   125,   126,    57,   162,   144,   143,     4,   138,
       5,   118,     6,     7,    59,   141,     8,     9,    10,    11,
      60,    75,    12,    13,    14,    15,   145,   143,    16,   146,
     143,   164,   143,    61,    17,    18,    19,    62,    90,    20,
      21,    22,    77,    82,    51,    23,    87,     4,    98,   178,
      97,   173,   158,   147,    50,   148,   165,     4,   153,     5,
     166,     6,     7,   154,   169,     8,     9,    10,    11,   155,
     168,    12,    13,    14,    15,   181,   182,    16,   130,   163,
       0,     0,     0,    17,    18,    19,     0,     0,    20,    21,
      22,     4,   117,     5,    23,     6,     7,     0,   179,     8,
       9,    10,    11,     0,     0,    12,    13,    14,    15,     0,
       0,    16,     0,     0,     0,     0,     0,    17,    18,    19,
       0,     0,    20,    21,    22,     4,     0,     5,    23,     6,
       7,     0,   180,     8,     9,    10,    11,     0,     0,    12,
      13,    14,    15,     0,     0,    16,     0,     0,     0,     0,
       0,    17,    18,    19,     0,     0,    20,    21,    22,     4,
       0,     5,    23,     6,     7,     0,   183,     8,     9,    10,
      11,     0,     0,    12,    13,    14,    15,     0,     0,    16,
       0,     0,     0,     0,     0,    17,    18,    19,     0,     0,
      20,    21,    22,     4,     0,     5,    23,     6,     7,     0,
     186,     8,     9,    10,    11,     0,     0,    12,    13,    14,
      15,     0,     0,    16,     0,     0,     0,    64,     0,    17,
      18,    19,    65,    66,    20,    21,    22,     0,     0,     0,
      23,     0,     0,     0,   187,     0,     0,     0,    67,    68,
      69,    70,     0,     0,     0,     0,     0,    71,    72,    73,
      74,    75,     4,     0,     5,   177,     6,     7,     0,     0,
       8,     9,    10,    11,     0,     0,    12,    13,    14,    15,
       0,     0,    16,     0,     0,     0,     0,     0,    17,    18,
      19,     0,    64,    20,    21,    22,     4,    65,     5,    23,
       6,     0,     0,     0,     8,     9,    10,    11,     0,     4,
      46,     5,     0,    67,    68,    69,    70,     8,     9,    10,
      11,     0,     0,    46,    19,     0,    75,    20,    21,    22,
       0,     0,    93,    23,     0,     0,     0,    19,     0,     0,
      20,    21,    22,     0,     0,    47,    23,     4,     0,     5,
       0,     0,     0,     0,     0,     8,     9,    10,    11,     0,
       0,    46,     0,     0,    64,     0,     0,     0,     0,    65,
      66,     0,     0,     0,     0,    19,     0,     0,    20,    21,
      22,     0,     0,    52,    23,    67,    68,    69,    70,     0,
       0,     0,     0,     0,    71,    72,    73,    74,    75,    64,
       0,   102,     0,     0,    65,    66,     0,     0,     0,     0,
       0,     0,     0,     0,     0,     0,     0,     0,     0,    64,
      67,    68,    69,    70,    65,    66,     0,     0,     0,    71,
      72,    73,    74,    75,     0,     0,   134,     0,     0,   167,
      67,    68,    69,    70,   170,   171,   172,     0,     0,    71,
      72,    73,    74,    75,     0,     4,   135,     5,     0,   176,
       0,     0,     0,     8,     9,    10,    11,     0,     4,    46,
       5,     0,   184,   185,     0,     0,     8,     9,    10,    11,
       0,     0,    46,    19,     0,     0,    20,    21,    22,    64,
       0,   137,    23,     0,    65,    66,    19,     0,     0,    20,
      21,    22,     0,     0,   157,    23,     0,     0,     0,     0,
      67,    68,    69,    70,     0,     0,     0,     0,     0,    71,
      72,    73,    74,    75,     0,     4,   174,     5,     0,     0,
       0,     0,     0,     8,     9,    10,    11,     0,     4,    46,
       5,     0,     0,     0,     0,     0,     8,     9,    10,    11,
       0,     0,    46,    19,     0,     0,    20,    21,    22,     0,
       0,     0,    23,     0,     0,     0,    19,     0,     0,   110,
      21,    22,     4,     0,     5,    23,     0,     0,     0,     0,
       8,     9,    10,    11,     0,     4,    46,     5,     0,     0,
       0,     0,     0,     8,     9,    10,    11,     0,     0,    46,
      19,     0,    64,    20,   112,    22,     0,    65,    66,    23,
       0,     0,     0,    19,     0,     0,    20,    21,   114,     0,
       0,     0,    23,    67,    68,    69,    70,     0,     0,     0,
       0,     0,    71,    72,    73,    74,    75,    76,    64,     0,
       0,     0,     0,    65,    66,     0,     0,     0,     0,     0,
       0,     0,     0,     0,     0,     0,     0,     0,    64,    67,
      68,    69,    70,    65,    66,     0,     0,     0,    71,    72,
      73,    74,    75,    86,     0,     0,     0,     0,    64,    67,
      68,    69,    70,    65,    66,     0,     0,     0,    71,    72,
      73,    74,    75,    89,     0,     0,     0,     0,    64,    67,
      68,    69,    70,    65,    66,     0,     0,     0,    71,    72,
      73,    74,    75,   136,     0,     0,     0,     0,    64,    67,
      68,    69,    70,    65,    66,     0,     0,     0,    71,    72,
      73,    74,    75,   149,     0,     0,     0,     0,    64,    67,
      68,    69,    70,    65,    66,     0,     0,     0,    71,    72,
      73,    74,    75,   156,     0,     0,     0,     0,    64,    67,
      68,    69,    70,    65,     0,     0,     0,     0,    71,    72,
      73,    74,    75,    64,     0,     0,     0,     0,    65,    67,
      68,    69,    70,     0,     0,     0,     0,     0,    71,    72,
      73,    74,    75,     0,    67,    68,    69,    70,     0,     0,
       0,     0,     0,     0,     0,    73,    74,    75);
  


  /** @var int[] */
  public array $yycheck = array(     7,     8,    57,     3,     3,     5,    13,     7,     8,     3,
       0,    11,    12,    13,    14,     7,    23,    17,    18,    19,
      20,    33,     9,    23,    33,    17,    41,    42,    40,    29,
      30,    31,     3,    42,    34,    35,    36,    33,    33,     3,
      40,    14,    41,    39,    44,    40,     3,    41,    55,    56,
      57,    38,    44,    60,    61,    62,    40,    64,    65,    66,
      67,    68,    69,    70,    71,    72,    73,    74,    40,    40,
      77,    78,    79,    80,    81,    82,    79,    84,    81,    82,
      21,    22,    21,    22,    40,   140,    41,    42,     3,    96,
       5,    98,     7,     8,     3,    98,    11,    12,    13,    14,
      34,    38,    17,    18,    19,    20,    41,    42,    23,    41,
      42,    41,    42,    35,    29,    30,    31,    36,    39,    34,
      35,    36,    40,    40,    40,    40,    40,     3,    40,    44,
      43,    41,   139,    40,     3,    43,   143,     3,    43,     5,
     147,     7,     8,    43,   151,    11,    12,    13,    14,    43,
      43,    17,    18,    19,    20,    43,    43,    23,    87,   140,
      -1,    -1,    -1,    29,    30,    31,    -1,    -1,    34,    35,
      36,     3,    75,     5,    40,     7,     8,    -1,    44,    11,
      12,    13,    14,    -1,    -1,    17,    18,    19,    20,    -1,
      -1,    23,    -1,    -1,    -1,    -1,    -1,    29,    30,    31,
      -1,    -1,    34,    35,    36,     3,    -1,     5,    40,     7,
       8,    -1,    44,    11,    12,    13,    14,    -1,    -1,    17,
      18,    19,    20,    -1,    -1,    23,    -1,    -1,    -1,    -1,
      -1,    29,    30,    31,    -1,    -1,    34,    35,    36,     3,
      -1,     5,    40,     7,     8,    -1,    44,    11,    12,    13,
      14,    -1,    -1,    17,    18,    19,    20,    -1,    -1,    23,
      -1,    -1,    -1,    -1,    -1,    29,    30,    31,    -1,    -1,
      34,    35,    36,     3,    -1,     5,    40,     7,     8,    -1,
      44,    11,    12,    13,    14,    -1,    -1,    17,    18,    19,
      20,    -1,    -1,    23,    -1,    -1,    -1,     4,    -1,    29,
      30,    31,     9,    10,    34,    35,    36,    -1,    -1,    -1,
      40,    -1,    -1,    -1,    44,    -1,    -1,    -1,    25,    26,
      27,    28,    -1,    -1,    -1,    -1,    -1,    34,    35,    36,
      37,    38,     3,    -1,     5,    42,     7,     8,    -1,    -1,
      11,    12,    13,    14,    -1,    -1,    17,    18,    19,    20,
      -1,    -1,    23,    -1,    -1,    -1,    -1,    -1,    29,    30,
      31,    -1,     4,    34,    35,    36,     3,     9,     5,    40,
       7,    -1,    -1,    -1,    11,    12,    13,    14,    -1,     3,
      17,     5,    -1,    25,    26,    27,    28,    11,    12,    13,
      14,    -1,    -1,    17,    31,    -1,    38,    34,    35,    36,
      -1,    -1,    39,    40,    -1,    -1,    -1,    31,    -1,    -1,
      34,    35,    36,    -1,    -1,    39,    40,     3,    -1,     5,
      -1,    -1,    -1,    -1,    -1,    11,    12,    13,    14,    -1,
      -1,    17,    -1,    -1,     4,    -1,    -1,    -1,    -1,     9,
      10,    -1,    -1,    -1,    -1,    31,    -1,    -1,    34,    35,
      36,    -1,    -1,    39,    40,    25,    26,    27,    28,    -1,
      -1,    -1,    -1,    -1,    34,    35,    36,    37,    38,     4,
      -1,    41,    -1,    -1,     9,    10,    -1,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,     4,
      25,    26,    27,    28,     9,    10,    -1,    -1,    -1,    34,
      35,    36,    37,    38,    -1,    -1,    41,    -1,    -1,   148,
      25,    26,    27,    28,   153,   154,   155,    -1,    -1,    34,
      35,    36,    37,    38,    -1,     3,    41,     5,    -1,   168,
      -1,    -1,    -1,    11,    12,    13,    14,    -1,     3,    17,
       5,    -1,   181,   182,    -1,    -1,    11,    12,    13,    14,
      -1,    -1,    17,    31,    -1,    -1,    34,    35,    36,     4,
      -1,    39,    40,    -1,     9,    10,    31,    -1,    -1,    34,
      35,    36,    -1,    -1,    39,    40,    -1,    -1,    -1,    -1,
      25,    26,    27,    28,    -1,    -1,    -1,    -1,    -1,    34,
      35,    36,    37,    38,    -1,     3,    41,     5,    -1,    -1,
      -1,    -1,    -1,    11,    12,    13,    14,    -1,     3,    17,
       5,    -1,    -1,    -1,    -1,    -1,    11,    12,    13,    14,
      -1,    -1,    17,    31,    -1,    -1,    34,    35,    36,    -1,
      -1,    -1,    40,    -1,    -1,    -1,    31,    -1,    -1,    34,
      35,    36,     3,    -1,     5,    40,    -1,    -1,    -1,    -1,
      11,    12,    13,    14,    -1,     3,    17,     5,    -1,    -1,
      -1,    -1,    -1,    11,    12,    13,    14,    -1,    -1,    17,
      31,    -1,     4,    34,    35,    36,    -1,     9,    10,    40,
      -1,    -1,    -1,    31,    -1,    -1,    34,    35,    36,    -1,
      -1,    -1,    40,    25,    26,    27,    28,    -1,    -1,    -1,
      -1,    -1,    34,    35,    36,    37,    38,    39,     4,    -1,
      -1,    -1,    -1,     9,    10,    -1,    -1,    -1,    -1,    -1,
      -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,     4,    25,
      26,    27,    28,     9,    10,    -1,    -1,    -1,    34,    35,
      36,    37,    38,    39,    -1,    -1,    -1,    -1,     4,    25,
      26,    27,    28,     9,    10,    -1,    -1,    -1,    34,    35,
      36,    37,    38,    39,    -1,    -1,    -1,    -1,     4,    25,
      26,    27,    28,     9,    10,    -1,    -1,    -1,    34,    35,
      36,    37,    38,    39,    -1,    -1,    -1,    -1,     4,    25,
      26,    27,    28,     9,    10,    -1,    -1,    -1,    34,    35,
      36,    37,    38,    39,    -1,    -1,    -1,    -1,     4,    25,
      26,    27,    28,     9,    10,    -1,    -1,    -1,    34,    35,
      36,    37,    38,    39,    -1,    -1,    -1,    -1,     4,    25,
      26,    27,    28,     9,    -1,    -1,    -1,    -1,    34,    35,
      36,    37,    38,     4,    -1,    -1,    -1,    -1,     9,    25,
      26,    27,    28,    -1,    -1,    -1,    -1,    -1,    34,    35,
      36,    37,    38,    -1,    25,    26,    27,    28,    -1,    -1,
      -1,    -1,    -1,    -1,    -1,    36,    37,    38);
  

/* YYSTOS[STATE-NUM] -- The symbol kind of the accessing symbol of
   state STATE-NUM.  */
  
  /** @var int[] */
  public array $yystos = array(     0,    46,    48,     0,     3,     5,     7,     8,    11,    12,
      13,    14,    17,    18,    19,    20,    23,    29,    30,    31,
      34,    35,    36,    40,    47,    49,    50,    51,    52,    53,
      54,    56,    57,    58,    59,    62,    63,    64,    65,    69,
      73,    74,    75,    77,    78,     3,    17,    39,    49,    49,
       3,    40,    39,    49,    14,    40,    40,    40,     3,     3,
      34,    35,    36,    49,     4,     9,    10,    25,    26,    27,
      28,    34,    35,    36,    37,    38,    39,    40,    33,    40,
      33,    40,    40,    67,    33,    39,    39,    40,    61,    39,
      39,    49,    49,    39,    49,    57,    70,    43,    40,    49,
      49,    49,    41,    49,    49,    49,    49,    49,    49,    49,
      34,    49,    35,    49,    36,    49,    49,    53,    49,    55,
      49,    55,    49,    55,    55,    21,    22,    66,    68,    49,
      61,     3,    41,    60,    41,    41,    39,    39,    49,    71,
      76,    55,    41,    42,    41,    41,    41,    40,    43,    39,
      41,    33,    42,    43,    43,    43,    39,    39,    49,    72,
      17,    44,    57,    62,    41,    49,    49,    48,    43,    49,
      48,    48,    48,    41,    41,    44,    48,    42,    44,    44,
      44,    43,    43,    44,    48,    48,    44,    44);
  

/* YYR1[RULE-NUM] -- Symbol kind of the left-hand side of rule RULE-NUM.  */
  
  /** @var int[] */
  public array $yyr1 = array(     0,    45,    46,    47,    47,    47,    47,    47,    47,    47,
      47,    47,    47,    48,    48,    49,    49,    49,    49,    49,
      49,    49,    49,    49,    49,    49,    49,    49,    50,    51,
      51,    51,    51,    51,    51,    51,    51,    51,    51,    52,
      52,    52,    52,    52,    52,    52,    52,    53,    54,    55,
      55,    55,    56,    56,    56,    56,    57,    57,    58,    58,
      59,    59,    60,    60,    60,    60,    61,    61,    62,    63,
      64,    64,    65,    66,    67,    67,    68,    69,    69,    70,
      70,    70,    71,    71,    72,    72,    73,    74,    75,    76,
      76,    76,    77,    78);
  

/* YYR2[RULE-NUM] -- Number of symbols on the right-hand side of rule RULE-NUM.  */
  
  /** @var int[] */
  public array $yyr2 = array(     0,     2,     1,     1,     1,     2,     1,     1,     1,     1,
       1,     1,     1,     0,     2,     1,     1,     1,     1,     1,
       1,     1,     1,     1,     1,     1,     1,     1,     3,     3,
       3,     3,     3,     3,     3,     3,     3,     3,     3,     3,
       3,     3,     3,     3,     3,     3,     2,     1,     3,     0,
       1,     3,     4,     4,     4,     4,     3,     5,     3,     3,
       2,     3,     1,     2,     3,     4,     0,     2,     8,     7,
       2,     3,     7,     7,     0,     2,     4,     1,     3,     1,
       1,     2,     1,     2,     1,     1,     9,     7,     3,     0,
       2,     2,     5,     5);
  




  /* YYTRANSLATE(TOKEN-NUM) -- Symbol number corresponding to TOKEN-NUM
     as returned by yylex, with out-of-bounds checking.  */
  private function yytranslate(int $t): SymbolKind
  {
    // Last valid token kind.
    $code_max = 287;
    if ($t <= 0)
      return new SymbolKind(SymbolKind::S_YYEOF);
    else if ($t <= $code_max)
      return new SymbolKind($this->yytranslate_table[$t]);
    else
      return new SymbolKind(SymbolKind::S_YYUNDEF);
  }
  
  /** @var int[] */
  public array $yytranslate_table = array(     0,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
      40,    41,    36,    34,    42,    35,    38,    37,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,    39,
       2,    33,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,    43,     2,    44,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     1,     2,     3,     4,
       5,     6,     7,     8,     9,    10,    11,    12,    13,    14,
      15,    16,    17,    18,    19,    20,    21,    22,    23,    24,
      25,    26,    27,    28,    29,    30,    31,    32);
  


  public const YYLAST = 877;
  public const YYEMPTY = -2;
  public const YYFINAL = 3;
  public const YYNTOKENS = 45;


}
/* "grammar.y":248  */

