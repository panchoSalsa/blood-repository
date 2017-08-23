<?php
/*
when login in users who have a valid ucinet id but there status is not active 
in the `users` table will see this page.

-- this is a `users` record that has a valid ucinet id and active status.

-- id | uci_net_id | active | activation
-- 0  | frfranco   | 1      | 2017-06-27
*/
?>

<h1>
	You do not have permissions to use the application.
	<br>
	Please contact the UCI MIND Tissue Repository in order to gain access.
	<?php
		// redirect after 5 seconds
		header( "refresh:5;url=https://www.mind.uci.edu/adrc/neuropathology-core/");
	?>
<h1>