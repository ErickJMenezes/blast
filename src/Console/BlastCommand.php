<?php

namespace Blast\Console;

use Blast\Language\Lexer;
use Blast\Language\Parser;
use Mrsuh\Tree\Printer;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'blast',
    description: 'Blast runner'
)]
class BlastCommand extends Command
{
    protected function configure()
    {
        $this
            ->addArgument('file', InputArgument::REQUIRED, 'The source code file.')
            ->addOption('dump-ast', 'd', InputOption::VALUE_NONE, 'Dump the AST from the given source code.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $file = $input->getArgument('file');

        if (!file_exists($file)) {
            $output->writeln("The given file [$file] does not exists.");
            return Command::INVALID;
        }

        $fileContents = file_get_contents($file);

        $parser = new Parser(new Lexer($fileContents));

        if (!$parser->parse()) {
            $output->writeln("Syntax errors found. Please fix the code and try again.");
            return Command::FAILURE;
        }

        if ($input->getOption('dump-ast')) {
            (new Printer())->print($parser->getAst());
        }

        return Command::SUCCESS;
    }
}
