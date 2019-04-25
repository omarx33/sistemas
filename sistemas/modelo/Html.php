<?php

class html
{

	function __construct()
	{

	}

	function header()
	{

	echo '
	</head>
	<body>
	<div class="container-fluid">
	';

	}

	function footer()
	{

	echo '
    <br></br>
	<p class="text-center">&copy; '.date('Y').' Rockdrill - Overprime - Codrise - Helix</p>
	</div>
	<script src="'.PATH.'ajax/logout.js"></script>
	</body>
	</html>';

	}
}


 ?>
