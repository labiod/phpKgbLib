<?php
/**
 * @var $address Address
 * @var $select SimpleSelect
 * @var $user UserTable
 */
$user = $this->_user;
$select = $this->_select;
$address = $user->getAddress();
$select->setSelectedOption($address->getDistrictId());
?>
<tr>
    <td class="left">Miasto:</td>
    <td class="right"><input type="text" value="<?php $address->getCityName(); ?>" name="city" id="name" class="itext"></td>
</tr>
<tr>
    <td class="left">Adres:</td>
    <td class="right"><input type="text" value="<?php $address->getCityName(); ?>" name="address" id="name" class="itext"></td>
</tr>
<tr>
    <td class="left">Kod pocztowy:</td>
    <td class="right"><input type="text" value="<?php $address->getCityName(); ?>" name="address" id="name" class="itext"></td>
</tr>
<tr>
    <td class="left">Województwo:</td>
    <td class="right"><?php $select->show(); ?></td>
</tr>