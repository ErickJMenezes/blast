%{
use Blast\Language\Node\Expression;
use Blast\Language\Node\Statement;
use Blast\Language\Node;
%}

%define api.namespace {Blast\Language}
%define api.parser.class {Parser}

%code parser {
    private Node $ast;
    public function setAst(Node $ast): void { $this->ast = $ast; }
    public function getAst(): Node { return $this->ast; }
}

%token T_STRING
%token T_EQ
%token T_IDENTICAL
%token T_NUMBER
%token T_SEMICOLON
%token T_WHITESPACE
%token T_VAR
%token T_EXIT
%token T_PLUS
%token T_MINUS
%token T_TIMES
%token T_DIV
%token T_AND
%token T_OR
%token T_NOT
%token T_TRUE
%token T_FALSE
%token T_OPEN_PARENTHESIS
%token T_CLOSE_PARENTHESIS
%token T_USER_STRING
%token T_BACKSLASH
%token T_DOUBLE_QUOTE
%token T_COMMA
%token T_OPEN_BRACES
%token T_CLOSE_BRACES
%token T_FUN
%token T_RETURN
%token T_IMPORT
%token T_IF
%token T_ELIF
%token T_ELSE
%token T_WHILE
%token T_BREAK
%token T_GT
%token T_LT
%token T_GTE
%token T_LTE
%token T_FOR
%token T_DOT
%token T_TYPE
%token T_NEW
%token T_EOL

%left T_EQ
%left T_OR
%left T_PLUS T_MINUS
%left T_TIMES T_DIV
%left T_GT T_GTE T_LT T_LTE T_IDENTICAL
%left T_AND
%left T_NOT
%left T_DOT

%%
start:
    statement_list			{ self::setAst(new Statement\StatementList($1)); }
;

statement:
    variable_declaration    { $$ = $1; }
|	exit					{ $$ = $1; }
|	expression T_SEMICOLON	{ $$ = $1; }
|	fun_declaration			{ $$ = $1; }
|	return					{ $$ = $1; }
|	if_statement			{ $$ = $1; }
|	for_statement			{ $$ = $1; }
|	while_statement			{ $$ = $1; }
|	import					{ $$ = $1; }
|	type_declaration		{ $$ = $1; }
;

statement_list:					  { $$ = []; }
|	statement_list statement	  { $$ = [...$1, $2];  }
;

expression:
    T_NUMBER            										{ $$ = new Expression\NumberNode($1); }
|   T_USER_STRING       										{ $$ = new Expression\StringNode($1); }
|   T_TRUE              										{ $$ = new Expression\BooleanNode($1); }
|   T_FALSE             										{ $$ = new Expression\BooleanNode($1); }
|	math_expression												{ $$ = $1; }
|	boolean_expression											{ $$ = $1; }
|	variable													{ $$ = $1; }
|	property_fetch												{ $$ = $1; }
|	fun_expression												{ $$ = $1; }
|	function_call												{ $$ = $1; }
|  	new_object													{ $$ = $1; }
| 	assignment_expression										{ $$ = $1; }

|	expression_node
;

expression_node:
	T_OPEN_PARENTHESIS expression T_CLOSE_PARENTHESIS			{ $$ = new Expression\ExpressionNode([$2]); }
;

math_expression:
	expression T_PLUS expression		{ $$ = new Expression\MathExpression($2, [$1, $3]); }
|	expression T_MINUS expression		{ $$ = new Expression\MathExpression($2, [$1, $3]); }
|	expression T_TIMES expression		{ $$ = new Expression\MathExpression($2, [$1, $3]); }
|	expression T_DIV expression			{ $$ = new Expression\MathExpression($2, [$1, $3]); }

|	expression T_PLUS T_PLUS			{ $$ = new Expression\PostIncrement([$1]); }
|	T_PLUS T_PLUS expression			{ $$ = new Expression\PreIncrement([$3]); }

|	expression T_MINUS T_MINUS			{ $$ = new Expression\PostDecrement([$1]); }
|	T_MINUS T_MINUS expression			{ $$ = new Expression\PreDecrement([$3]); }

|	expression T_TIMES T_TIMES			{ $$ = new Expression\PostPower([$1]); }
|	T_TIMES T_TIMES expression			{ $$ = new Expression\PrePower([$3]); }
;

boolean_expression:
	expression T_GT expression				{ $$ = new Expression\BooleanExpression($2, [$1, $3]); }
|	expression T_GTE expression				{ $$ = new Expression\BooleanExpression($2, [$1, $3]); }
|	expression T_LT expression				{ $$ = new Expression\BooleanExpression($2, [$1, $3]); }
|	expression T_LTE expression				{ $$ = new Expression\BooleanExpression($2, [$1, $3]); }
|	expression T_IDENTICAL expression		{ $$ = new Expression\BooleanExpression($2, [$1, $3]); }

|	expression T_AND expression				{ $$ = new Expression\BooleanExpression($2, [$1, $3]); }
|	expression T_OR expression				{ $$ = new Expression\BooleanExpression($2, [$1, $3]); }

|	T_NOT expression						{ $$ = new Expression\BooleanNegationExpression([$2]); }
;

variable:
	T_STRING						{ $$ = new Expression\VariableFetch($1); }
;

property_fetch:
	expression T_DOT variable		{ $$ = new Expression\PropertyFetch($1, $3); }
;

function_call_args:									{ $$ = []; }
|	expression										{ $$ = [$1]; }
|	function_call_args T_COMMA expression			{ $$ = [...$1, $3]; }
;

function_call:
	variable T_OPEN_PARENTHESIS function_call_args T_CLOSE_PARENTHESIS				{ $$ = new Expression\FunctionCall($1, $3); }
|	property_fetch T_OPEN_PARENTHESIS function_call_args T_CLOSE_PARENTHESIS		{ $$ = new Expression\FunctionCall($1, $3); }
|	expression_node T_OPEN_PARENTHESIS function_call_args T_CLOSE_PARENTHESIS		{ $$ = new Expression\FunctionCall($1, $3); }
|	function_call T_OPEN_PARENTHESIS function_call_args T_CLOSE_PARENTHESIS		{ $$ = new Expression\FunctionCall($1, $3); }
;

variable_declaration:
    T_VAR T_STRING T_SEMICOLON                      { $$ = new Statement\VariableDeclaration($2); }
|   T_VAR T_STRING T_EQ expression T_SEMICOLON      { $$ = new Statement\VariableDeclaration($2, $4); }
;

assignment_expression:
	variable T_EQ expression							{ $$ = new Expression\AssignmentExpression($1, $3); }
|	property_fetch T_EQ expression						{ $$ = new Expression\AssignmentExpression($1, $3); }
;

exit:
	T_EXIT T_SEMICOLON 								{ $$ = new Statement\ExitStatement(); }
|	T_EXIT expression T_SEMICOLON 					{ $$ = new Statement\ExitStatement($2); }
;

fun_param:
    T_STRING                      			{ $$ = new Statement\VariableDeclaration($1); }
|   T_STRING T_COMMA                 		{ $$ = new Statement\VariableDeclaration($1); }
|   T_STRING T_EQ expression      			{ $$ = new Statement\VariableDeclaration($1, $3); }
|   T_STRING T_EQ expression T_COMMA     	{ $$ = new Statement\VariableDeclaration($1, $3); }
;

fun_param_list:							{ $$ = []; }
|	fun_param_list fun_param			{ $$ = [...$1, $2]; }
;

fun_declaration:
	T_FUN T_STRING T_OPEN_PARENTHESIS fun_param_list T_CLOSE_PARENTHESIS T_OPEN_BRACES statement_list T_CLOSE_BRACES	{ $$ = new Statement\FunctionDeclaration($2, $4, $7); }
;

fun_expression:
	T_FUN T_OPEN_PARENTHESIS fun_param_list T_CLOSE_PARENTHESIS T_OPEN_BRACES statement_list T_CLOSE_BRACES	{ $$ = new Expression\FunctionExpression($3, $6); }
;

return:
	T_RETURN T_SEMICOLON				{ $$ = new Statement\ReturnStatement(); }
|	T_RETURN expression T_SEMICOLON		{ $$ = new Statement\ReturnStatement($2); }
;

base_if_statement:
	T_IF T_OPEN_PARENTHESIS expression T_CLOSE_PARENTHESIS T_OPEN_BRACES statement_list T_CLOSE_BRACES 		{ $$ = new Statement\IfStatement($3, $6); }
;

else_if_statement:
	T_ELIF T_OPEN_PARENTHESIS expression T_CLOSE_PARENTHESIS T_OPEN_BRACES statement_list T_CLOSE_BRACES	{ $$ = new Statement\ElseIfStatement($3, $6); }
;

multi_else_if_statement: 							{ $$ = []; }
|	multi_else_if_statement else_if_statement		{ $$ = [...$1, $2]; }
;

else_statement:
	T_ELSE T_OPEN_BRACES statement_list T_CLOSE_BRACES	{ $$ = new Statement\ElseStatement($3); }
;

if_statement:
	base_if_statement												{ $$ = $1; }
|	base_if_statement multi_else_if_statement else_statement		{ $$ = new Statement\IfStatement($1->condition, $1->children, $2, $3); }
;

for_init_expression:
	T_SEMICOLON				{ $$ = null; }
|	variable_declaration	{ $$ = $1; }
|	expression T_SEMICOLON	{ $$ = $1; }
;

for_condition:
	T_SEMICOLON				{ $$ = null; }
|	expression T_SEMICOLON	{ $$ = $1; }
;

for_update_expression:
	T_SEMICOLON				{ $$ = null; }
|	expression				{ $$ = $1; }
;

for_statement:
	T_FOR T_OPEN_PARENTHESIS for_init_expression for_condition for_update_expression T_CLOSE_PARENTHESIS T_OPEN_BRACES statement_list T_CLOSE_BRACES		{ $$ = new Statement\ForStatement($3, $4, $5, $8); }
;

while_statement:
	T_WHILE T_OPEN_PARENTHESIS expression T_CLOSE_PARENTHESIS T_OPEN_BRACES statement_list T_CLOSE_BRACES													{ $$ = new Statement\WhileStatement($3, $6); }
;

import:
	T_IMPORT T_USER_STRING T_SEMICOLON			{ $$ = new Statement\ImportStatement($1); }
;

type_body:							{ $$ = []; }
|	type_body variable_declaration	{ $$ = [...$1, $2]; }
|	type_body fun_declaration		{ $$ = [...$1, $2]; }
;

type_declaration:
	T_TYPE T_STRING	T_OPEN_BRACES type_body T_CLOSE_BRACES		{ $$ = new Statement\TypeDeclarationStatement($2, $4); }
;

new_object:
	T_NEW T_STRING T_OPEN_PARENTHESIS function_call_args T_CLOSE_PARENTHESIS	{ $$ = new Expression\NewObjectExpression($2, $4); }
;
%%
