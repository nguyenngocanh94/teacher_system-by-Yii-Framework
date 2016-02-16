
#include <stdio.h>
#include <stdlib.h>
#include<conio.h>


#include "reader.h"
#include "charcode.h"
#include "token.h"
#include "error.h"


extern int lineNo;
extern int colNo;
extern int currentChar;

extern CharCode charCodes[];

/***************************************************************/


void skipBlank() {
  while (currentChar != -1 && charCodes[currentChar] == CHAR_SPACE)
	readChar();
}

void skipComment() {
  int state = 0;
  while ((currentChar != EOF) && (state < 2)) {
    switch (charCodes[currentChar]) {
    case CHAR_TIMES:
      state = 1;
      break;
    case CHAR_RPAR:
      if (state == 1) state = 2;
      else state = 0;
      break;
    default:
      state = 0;
    }
    readChar();
  }
  if (state != 2)
    error(ERR_ENDOFCOMMENT, lineNo, colNo);
}

Token* readIdentKeyword(void) {
  Token *token = makeToken(TK_NONE, lineNo, colNo);
  int count = 1;

  token->string[0] = (char)currentChar;
  readChar();

  while ((currentChar != EOF) && ((charCodes[currentChar] == CHAR_LETTER || charCodes[currentChar] == CHAR_DIGIT||currentChar=='_') )){
    if (count <= MAX_IDENT_LEN) token->string[count++] = (char)currentChar;
    readChar();
  }

  if (count > MAX_IDENT_LEN) {
    error(ERR_IDENTTOOLONG, lineNo, colNo);
    return token;
  }

  token->string[count] = '\0';
  token->tokenType = checkKeyword(token->string);

  if (token->tokenType == TK_NONE)
    token->tokenType = TK_IDENT;

  return token;
}

Token* readNumber(void) {
  int count = 0;
  Token* token = makeToken(TK_NUMBER, lineNo, colNo);

  while (charCodes[currentChar] == CHAR_DIGIT) {
	if (count > 10) {
		error(ERR_NUMBERTOOLONG, token->lineNo, token->colNo);
		break;
	}
    // Add current character to the number
    token->string[count] = currentChar;

    // Increase string index
    count++;

    // Read next character
    readChar();
  }

  // End string
  token->string[count] = '\0';

     // Convert current number to string
  token->value = atoi(token->string);
   return token;
}

Token* readConstChar(void) {
  Token *token = makeToken(TK_CHAR, lineNo, colNo);

  readChar();
  if (currentChar == EOF) {
    token->tokenType = TK_NONE;
    error(ERR_INVALIDCHARCONSTANT, token->lineNo, token->colNo);
    return token;
  }

  token->string[0] = currentChar;
  token->string[1] = '\0';
  // if(currentChar == '\'')
  readChar();
  if (currentChar == EOF) {
    token->tokenType = TK_NONE;
    error(ERR_INVALIDCHARCONSTANT, token->lineNo, token->colNo);
    return token;
  }

  if (charCodes[currentChar] == CHAR_SINGLEQUOTE) {
    readChar();
    return token;
  } else {
    token->tokenType = TK_NONE;
    error(ERR_INVALIDCHARCONSTANT, token->lineNo, token->colNo);
    return token;
  }
}

Token* getToken(void) {
  Token *token;
   int ln, cn;

  if (currentChar == EOF)
    return makeToken(TK_EOF, lineNo, colNo);

  switch (charCodes[currentChar]) {
  case CHAR_SPACE: skipBlank(); return getToken();
  case CHAR_LETTER: return readIdentKeyword();
  case CHAR_DIGIT: return readNumber();
  case CHAR_PLUS:
    // Token Plus
    token = makeToken(SB_PLUS, lineNo, colNo);
    readChar();
    return token;
  case CHAR_MINUS:
    // Token Minus
    token = makeToken(SB_MINUS, lineNo, colNo);
    readChar();
    return token;
  case CHAR_TIMES:
    // Token Times
    token = makeToken(SB_TIMES, lineNo, colNo);
    readChar();
    return token;
  case CHAR_SLASH:
    // Token Slash
    token = makeToken(SB_SLASH, lineNo, colNo);
    readChar();
    return token;
  case CHAR_LT:
    // Empty token
    token = makeToken(TK_NONE, lineNo, colNo);

    // Check next character
    readChar();
    switch(charCodes[currentChar]) {
    case CHAR_EQ:
      // Token Lest Than or Equal
      token->tokenType = SB_LE;
      readChar();
      return token;
     case CHAR_GT:
      // Token Lest Than or Equal
      token->tokenType = SB_KHAC;
      readChar();
      return token;
      default:
      // Token Lest Than
      token->tokenType = SB_LT;
      return token;
    }
  case CHAR_GT:
    // Token Greater
    token = makeToken(SB_GT, lineNo, colNo);

    // If next character is '='
    readChar();
    if (charCodes[currentChar] == CHAR_EQ) {
      // Token is Greater Than
      token->tokenType = SB_GE;
      readChar();
    }

    return token;
  case CHAR_EXCLAIMATION:
 /* token = makeToken(SB_EXCLAIMATION, lineNo, colNo);
  readChar();
  return token;*/
   // Make empty token
 ln=lineNo;
cn=colNo;
   token = makeToken(TK_NONE, lineNo, colNo);

    // If next character is not '='
    readChar();
    switch(charCodes[currentChar]) {
    case CHAR_EQ:

      token->tokenType = SB_NEQ;
      readChar();
      return token;
      default:
      error(ERR_INVALIDSYMBOL, ln, cn);
      readChar();
   return token;
      }
  case CHAR_EQ:
    // Token Equal
    token = makeToken(SB_EQ, lineNo, colNo);
    readChar();
    return token;
  case CHAR_COMMA:
    // Token Comma
    token = makeToken(SB_COMMA, lineNo, colNo);
    readChar();
    return token;
   case CHAR_PERIOD:
    // Token Period
    token = makeToken(SB_PERIOD, lineNo, colNo);

    // If next character is Right Parenthesis
    readChar();
    if (charCodes[currentChar] == CHAR_RPAR) {
      // it is token Right Parenthesis
      token->tokenType = SB_RSEL;
      readChar();
    }
    return token;
  case CHAR_COLON:
    // Token Semicolon
    token = makeToken(SB_COLON, lineNo, colNo);

    // If next character is Equal
    readChar();
    if (charCodes[currentChar] == CHAR_EQ) {
      // it is token Assignment
      token->tokenType = SB_ASSIGN;
      readChar();
    }
    return token;
  case CHAR_SEMICOLON:
    // Token Semicolon
    token = makeToken(SB_SEMICOLON, lineNo, colNo);
    readChar();
    return token;
  case CHAR_SINGLEQUOTE:
    return readConstChar();
  default:
    token = makeToken(TK_NONE, lineNo, colNo);
    error(ERR_INVALIDSYMBOL, lineNo, colNo);
    readChar();
    return token;
  case CHAR_RPAR:
    // Token Right Parenthesis
    token = makeToken(SB_RPAR, lineNo, colNo);
    readChar();
    return token;
  case CHAR_LPAR:
    // Empty token
    token = makeToken(TK_NONE, lineNo, colNo);
    // Get next character first
    readChar();

    switch(charCodes[currentChar]) {
    case CHAR_PERIOD:
      // This is token LSEL
      token->tokenType = SB_LSEL;
      readChar();
      return token;
    case CHAR_TIMES:
      // This is a comment so free the allocated token first then skip comments
      free(token);
      skipComment();
      return getToken();
    //case CHAR_SPACE:
      //readChar();
      //return getToken();
    default:
      // Token Left Parenthesis
      token->tokenType = SB_LPAR;
//       readChar();
      return token;
    }

  }
}
// Doc va tra ve mot Token hop le
Token* getValidToken(void) {
  Token *token = getToken();
  while (token->tokenType == TK_NONE) {
    free(token);
    token = getToken();
  }
  return token;
}

/******************************************************************/

void printToken(Token *token) {

  printf("%d-%d:", token->lineNo, token->colNo);

  switch (token->tokenType) {
  case TK_NONE: printf("TK_NONE\n"); break;
  case TK_IDENT: printf("TK_IDENT(%s)\n", token->string); break;
  case TK_NUMBER: printf("TK_NUMBER(%s)\n", token->string); break;
  case TK_CHAR: printf("TK_CHAR(\'%s\')\n", token->string); break;
  case TK_EOF: printf("TK_EOF\n"); break;

  case KW_PROGRAM: printf("KW_PROGRAM\n"); break;
  case KW_CONST: printf("KW_CONST\n"); break;
  case KW_TYPE: printf("KW_TYPE\n"); break;
  case KW_VAR: printf("KW_VAR\n"); break;
  case KW_INTEGER: printf("KW_INTEGER\n"); break;
  case KW_CHAR: printf("KW_CHAR\n"); break;
  case KW_ARRAY: printf("KW_ARRAY\n"); break;
  case KW_OF: printf("KW_OF\n"); break;
  case KW_FUNCTION: printf("KW_FUNCTION\n"); break;
  case KW_PROCEDURE: printf("KW_PROCEDURE\n"); break;
  case KW_BEGIN: printf("KW_BEGIN\n"); break;
  case KW_END: printf("KW_END\n"); break;
  case KW_CALL: printf("KW_CALL\n"); break;
  case KW_IF: printf("KW_IF\n"); break;
  case KW_THEN: printf("KW_THEN\n"); break;
  case KW_ELSE: printf("KW_ELSE\n"); break;
  case KW_WHILE: printf("KW_WHILE\n"); break;
  case KW_DO: printf("KW_DO\n"); break;
  case KW_FOR: printf("KW_FOR\n"); break;
  case KW_TO: printf("KW_TO\n"); break;

  case SB_SEMICOLON: printf("SB_SEMICOLON\n"); break;
  case SB_COLON: printf("SB_COLON\n"); break;
  case SB_PERIOD: printf("SB_PERIOD\n"); break;
  case SB_COMMA: printf("SB_COMMA\n"); break;
  case SB_ASSIGN: printf("SB_ASSIGN\n"); break;
  case SB_EQ: printf("SB_EQ\n"); break;
  case SB_NEQ: printf("SB_NEQ\n"); break;
  case SB_LT: printf("SB_LT\n"); break;
  case SB_LE: printf("SB_LE\n"); break;
  case SB_GT: printf("SB_GT\n"); break;
  case SB_GE: printf("SB_GE\n"); break;
  case SB_PLUS: printf("SB_PLUS\n"); break;
  case SB_MINUS: printf("SB_MINUS\n"); break;
  case SB_TIMES: printf("SB_TIMES\n"); break;
  case SB_SLASH: printf("SB_SLASH\n"); break;
  case SB_LPAR: printf("SB_LPAR\n"); break;
  case SB_RPAR: printf("SB_RPAR\n"); break;
  case SB_LSEL: printf("SB_LSEL\n"); break;
  case SB_RSEL: printf("SB_RSEL\n"); break;
  case SB_KHAC: printf("SB_KHAC\n"); break;
  case SB_TRAIV: printf("SB_TRAIV\n");break;
  case SB_PHAIV: printf("SB_PHAIV\n");break;
  case SB_EXCLAIMATION: printf("SB_EXCLAIMATION\n"); break;
  }
}

int scan(char *fileName) {
  Token *token;

  if (openInputStream(fileName) == IO_ERROR)
    return IO_ERROR;

  token = getToken();
  while (token->tokenType != TK_EOF) {
    printToken(token);
    free(token);
    token = getToken();
  }

  free(token);
  closeInputStream();
  return IO_SUCCESS;
}

/******************************************************************/

int main(int argc, char *argv[]) {
  if (argc <= 1) {
    printf("scanner: no input file.\n");
    return -1;
  }

  if (scan(argv[1]) == IO_ERROR) {
    printf("Can\'t read input file!\n");
    return -1;
  }

  return 0;
}



