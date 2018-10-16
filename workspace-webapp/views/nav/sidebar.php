<?php 
	$index = '/index.php?view=';
 ?>
<div class="side-bar">
	<ul>
		<li>
			<a class="item" href="/" id="sd_panelcontrol">
				Panel de control
				<i class="dashboard icon"></i>
			</a>
		</li>
		<li>
			<a href='<?php echo $index."carreras"; ?>' class="item" id="sd_carreras">
				Carreras
				<i class="university icon"></i>
			</a>
		</li>
		<li>
			<a href='<?php echo $index."cursos" ?>' class="item" id="sd_cursos">
				Cursos
				<i class="calendar outline icon"></i>
			</a>
		</li>
		<?php 
			if (!$esAlumno) { ?>
				<li>
					<a href='<?php echo $index."alumnos" ?>' id='sd_alumnos'>Alumnos<i class="users icon"></i></a>
				</li>
				<li>
					<a href='<?php echo $index."profesores" ?>' id='sd_profesores'>Profesores<i class="graduation cap icon"></i></a>
				</li>
				
		<?php } ?>
	</ul>
</div>


<script>
$(document).ready(function(){
    $("#tg-sidebar").click(function(){
        $(".side-bar").toggleClass("visible");
        $("#tg-sidebar").toggleClass("expanded2");
        $(".navbar-brand").toggleClass("expandedlogo2");
        if ($(".collapse").hasClass("in")) {
        	$(".collapse").removeClass("in")
        };
    });

    $(".side-bar").hover(function(){
        $("#tg-sidebar").toggleClass("expanded");
        $(".navbar-brand").toggleClass("expandedlogo");
        if ($(".collapse").hasClass("in") && !$(".navbar-brand").hasClass("expandedlogo2")) {
        	$(".collapse").removeClass("in")
        };
    });
});
</script>