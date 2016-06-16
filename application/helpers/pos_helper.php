<?php
function getcatalogs(){
	$ci = & get_instance();
	$query = "select * from catalogs where active='1'";
	$result = $ci->db->query($query);
	return $result->result();
}
