<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa user o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações
// com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'wp_imoveis');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '');

/** Nome do host do MySQL */
define('DB_HOST', '127.0.0.1:3307');

/** Charset do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '3Cvzkpz|E=OM|iC00-s=&=TdWw%C$ZL4ikA+fE#V/;TI7#;=H`GES }.=%&26tNl');
define('SECURE_AUTH_KEY',  '`,rUyQ9$.m(r]^kn[s. V<3E%xUJ1bxYX%#DTp8+rNGO+*[EJWDF7|yi<>R-~z@#');
define('LOGGED_IN_KEY',    '8|p8^oqufj!K,EH^<RROylyFB>&N}JqwU`W~9/vVpH_5 KS/5yf35).-dL48W>.C');
define('NONCE_KEY',        '[.^^}!DJCT{Q;^JJmN;k=rP?!pnLJd&sd8[<4/fiylkCpSIv$<m`uyE[jG^;iU)$');
define('AUTH_SALT',        '2qDoU1XZq7osmL]=<>}gZNtq05N1EN@//p/&JyL&p0,dWAyuq1P]ns#d?`>NSB,L');
define('SECURE_AUTH_SALT', 'CW)WmR+_ ~U7^`NAo`I6>Y3kww|+e3@dWlvpro48#1`;y.%uzTAHaeF#/q);d3;h');
define('LOGGED_IN_SALT',   'eQI%$ta{jFo,#0$8G/ALc%tzX:+4rP( 8(1KiAJf+5?>n}ob:}0|ZlA$TaR4:hhc');
define('NONCE_SALT',       '@iU6y^VN/u~+GC_2dj)FX.IAj:4/Jc k5exh7=i?HOnjM|}u]*vNf(&7R&)$rI]%');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * para cada um um único prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';

/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
