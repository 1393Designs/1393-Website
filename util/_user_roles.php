<?

	$roles = '';
	if (!empty($user_roles)) {
		$counter = 1;
		foreach ($user_roles as $r) {
			$roles .= $r['name'];
			$roles .= ' ('.$r['role'].')';
			if ($counter != (count($user_roles))) {
				$roles .= ', ';
			} // endif
			$counter++;
		} // foreach
	}
	
?>