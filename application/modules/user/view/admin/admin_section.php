<?php
/**
 * @var $user UserTable
 */
?>
<tr>
    <td class="left">Imie:</td>
    <td class="right"><input type="text" value="<?php $user->getFirstName(); ?>" name="first_name" id="name" class="itext"></td>
</tr>
<tr>
    <td class="left">Nazwisko:</td>
    <td class="right"><input type="text" value="<?php $user->getLastName(); ?>" name="last_name" id="name" class="itext"></td>
</tr>