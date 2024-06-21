# Fwlink
O Fwlink é um projeto de encurtador de URLs.

## Funcionalidades
Encurtar URL: Recebe uma URL através de uma requisição e a armazena no banco de dados, retornando um ID curto.

Redirecionar URL: Redireciona para a URL original baseada no ID fornecido na requisição.

## Uso

### Encurtar uma URL
Para encurtar uma URL, faça uma requisição para a API com o parâmetro link.

Exemplo:
   ```bash
   GET /fwlink/?link=https://www.google.com
   ```

### Redirecionar para a URL Original
Para redirecionar, forneça o ID da URL encurtada na requisição.

Exemplo:
   ```bash
   GET /fwlink/?id=123
   ```

Se o ID existir no banco de dados, o usuário será redirecionado para a URL original.
