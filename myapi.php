<?php header('Content-type: text/xml'); ?>
<root>
<function>
<function_name>ItemList</function_name>
<function_URL>items.php</function_URL>
<parameters>
<param>
<name>seller</name>
<default>seller1</default>
</param>
</parameters>
</function>

<function>
<function_name>CardCheck</function_name>
<function_URL>bank/cardCheck.php</function_URL>
<parameters>
<param>
<name>cardNum</name>
</param>
<param>
<name>cardPin</name>
</param>
</parameters>
</function>

<function>
<function_name>Add Balance</function_name>
<function_URL>market/addBalance.php</function_URL>
<parameters>
<param>
<name>balance</name>
</param>
<param>
<name>user_id</name>
</param>
</parameters>
</function>

<function>
<function_name>Search</function_name>
<function_URL>search.php</function_URL>
<parameters>
<param>
<name>item_name</name>
</param>
</parameters>
</function>

<function>
<function_name>Purchase</function_name>
<function_URL>purchase.php</function_URL>
<parameters>
<param>
<name>item_id</name>
</param>
<param>
<name>seller_ip</name>
</param>
<param>
<name>user_id</name>
</param>
<param>
<name>quantity</name>
</param>
</parameters>
</function>

<function>
<function_name>Search Purchase</function_name>
<function_URL>searchPurchase.php</function_URL>
<parameters>
<param>
<name>purchase_id</name>
</param>
</parameters>
</function>

<function>
<function_name>Cancel Purchase</function_name>
<function_URL>market/cancelPurchase.php</function_URL>
<parameters>
<param>
<name>purchase_id</name>
</param>
</parameters>
</function>

</root>


