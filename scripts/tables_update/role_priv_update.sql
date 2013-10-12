
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

INSERT INTO `lpunkt`.`roles_priv` (
`id_privilage` ,
`id_role` ,
`module` ,
`action_name`
)
VALUES (
NULL , '5', 'user', 'login'
);

INSERT INTO `lpunkt`.`roles_priv` (
`id_privilage` ,
`id_role` ,
`module` ,
`action_name`
)
VALUES (
NULL , '5', 'index', 'index'
);