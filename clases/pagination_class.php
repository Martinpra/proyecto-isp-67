<?php 
/*
Developed by Reneesh T.K
reneeshtk@gmail.com
You can use it with out any worries...It is free for you..It will display the out put like:
First | Previous | 3 | 4 | 5 | 6 | 7| 8 | 9 | 10 | Next | Last
Page : 7  Of  10 . Total Records Found: 20
*/
class Pagination_class{
	var $result;
	var $anchors;
	var $total;
	function Pagination_class($qry, $base, $starting,$recpage)
	{
		$rst		=	mysqli_query($base, $qry) or die("Error en la conexion");
		$numrows	=	mysqli_num_rows($rst);
		$qry		 .=	" limit $starting, $recpage";
		$this->result	=	mysqli_query($base, $qry) or die("Error en la conexion");
		$next		=	$starting+$recpage;
		$var		=	((intval($numrows/$recpage))-1)*$recpage;
		$page_showing	=	intval($starting/$recpage)+1;
		$total_page	=	ceil($numrows/$recpage);
		$anc = ''; $anch = '';

		if($numrows % $recpage != 0){
			$last = ((intval($numrows/$recpage)))*$recpage;
		}else{
			$last = ((intval($numrows/$recpage))-1)*$recpage;
		}
		$previous = $starting-$recpage;
		if($previous < 0){
			$anc = "Primera | Anterior | ";
		}else{
			$anc .= "<a href='javascript:pagination(0);'>Primera | </a>";
			$anc .= "<a href='javascript:pagination($previous);'>Anterior | </a>";
		}
		
		################If you dont want the numbers just comment this block###############	
		$norepeat = 4;//no of pages showing in the left and right side of the current page in the anchors 
		$j = 1;
		for($i=$page_showing; $i>1; $i--){
			$fpreviousPage = $i-1;
			$page = ceil($fpreviousPage*$recpage)-$recpage;
			$anch = "<a href='javascript:pagination($page);'>$fpreviousPage | </a>".$anch;
			if($j == $norepeat) break;
			$j++;
		}
		$anc .= $anch;
		$anc .= $page_showing ."| ";
		$j = 1;
		for($i=$page_showing; $i<$total_page; $i++){
			$fnextPage = $i+1;
			$page = ceil($fnextPage*$recpage)-$recpage;
			$anc .= "<a href='javascript:pagination($page);'>$fnextPage | </a>";
			if($j==$norepeat) break;
			$j++;
		}
		############################################################
		if($next >= $numrows){
			$anc .= "Siguiente | Ultima ";
		}else{
			$anc .= "<a href='javascript:pagination($next);'>Siguiente | </a>";
			$anc .= "<a href='javascript:pagination($last);'>Ultima</a>";
		}
		$this->anchors = $anc;
		
		$this->total = "<svaluestrong>Pagina : $page_showing <i> De  </i> $total_page . Total Productos Encontrados: $numrows</svaluestrong>";
	}
}
?>