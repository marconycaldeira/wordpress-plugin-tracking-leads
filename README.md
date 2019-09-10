# Configurações
1. Instalar o plugin no Wordpress fazendo o upload e ativando-o;
2. Acessar as configurações do plugin;
1.1. O campo "Parâmetro de URL da campanha" deverá ser preenchido com o nome do parâmetro configurado na campanha. Ex.: "http://seusite.com.br?source=facebook"
1.2. O campo "ID do input a ser populado" deverá ser preenchido com o ID (atributo html) do input do formulário que vai ser responsável por enviar para o webhook do CRM. Obs.: recomendo criar um input do tipo hidden;
1.3. O campo "Slug das páginas contendo os formulários" como o próprio nome diz, deverá ser preenchido com os slugs das páginas (separados por vírgula) que possuem formulário. Ex.: "cotacao,contato"

3. Com tudo configurado, quando o visitante clicar em alguma campanha seja do facebook, twitter, google etc. e o link clicado vier com a variável preenchida corretamente o wordpress vai pegar esse parâmetro de url e salvar em um cookie com duração de 1 hora. Quando o visitante acessar a página de cotação, o wordpress vai preencher o campo hidden com o valor do cookie, submetendo-o em seguida para o webhook.

## Dependências
Para funcionamento preciso, recomendo utilizar o plugin Elementor do Wordpress, para confecção dos formulários.
