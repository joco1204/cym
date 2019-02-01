<?php 
include '../../../config/session.php';
$session = new Session();
$session->start();
$get = ((object) $_GET);

if(!$session->getSession('token') || $session->getSession('token') == ''){
    $session->destroy();
    header('location: ../../index.php');
}

$arr_empresas = $session->getSession('empresa');
$obj_empresas = ((object) $arr_empresas);
$obj_empresas = new stdClass();

?>
<section class="content-header">
	<input type="hidden" name="num_empresas" id="num_empresas" value="<?php echo $session->getSession('num_empresas'); ?>">
	<?php 
		foreach ($arr_empresas as $key => $valor){
			$i = ($key + 1);
		    $obj_empresas->$key = $valor;
		    echo '<input type="hidden" name="empresa_'.$i.'" id="empresa_'.$i.'" value="'.$obj_empresas->$key.'">';
		}
	?>
	<h1>
		<b>EMPRESAS</b>
	</h1>
</section>
<section class="content">
    <div class="container" id="container_panel"></div>
</section>
<script src="../../js/analista/analista.js"></script>
