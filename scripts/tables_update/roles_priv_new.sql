INSERT INTO `lpunkt`.`roles_priv` (
`id_role` ,
`module` ,
`action_name`
)
VALUES (
'1', 'user', 'logout'
), (
'2', 'user', 'logout'
), (
'3', 'user', 'logout'
), (
'1', 'user', 'oskSite'
), (
'2', 'user', 'oskSite'
), (
'3', 'user', 'oskSite'
),(
'1', 'user', 'profile'
), (
'2', 'user', 'profile'
), (
'3', 'user', 'profile'
);

INSERT INTO `lpunkt`.`osk_site` (
`id_osk_site` ,
`osk_id` ,
`user_id`
)
VALUES (
NULL , '1', '2'
), (
NULL , '2', '2'
),(
NULL, '1', '4'
), (
NULL, '2', '4'
), (
NULL , '2', '5'
);