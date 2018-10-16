<?php 
session_start();
if (isset($_SESSION['login'])) {
	if ($_SESSION['login']) {
		$login = $_SESSION['login'];
		$codigo = $_SESSION['codigo'];
		$nome = $_SESSION['nome'];
		$email = $_SESSION['email'];
		$senha = $_SESSION['senha'];
	}
}
?>
<!-- Cabeçalho do site -->
<?php
	include_once('header.php');
?>

	<script type="text/javascript">
			document.getElementById('quem_somos').style.display = "block";
	</script>

<div class="container">
		
		<!-- Texto sobre a empresa -->
		
		<div class="row mt-5 mb-3">
					
			<div class="claro col-12">
					<h3 id="item1" class="mb-4 text-center corTitulo">Quem Somos <!--<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAVJSURBVFhH7Zh37CVTFMdHr0F0VonoJauX1YMokeglLHb16ARhl4ggSERPFhHsEolOlBB9tWhLsKsF0aKF6HbV3c/nvj3MvJn5vZlJ/Lff5JO8M/PmzJ17zz3nzGSz9D9rHtgPLoGr4GCYA7poLtgb9HU1HA5zQmetDR/C9D7egJHQRivDe9Dv6x04AlprbnBwP8KRsDQ4A/uCTnV+PDTR7PAW/ALHwTBw5nYDj+trLLTSNuCFxyarKJd4EnyUrMHaEPR1erKKmg2egW+S1UIngE7XTFZZl4HnjdFBGg3+d5NklXUeeH6xZDWUy+pFw5NV1nXwBzgDg3QA6GtEssq6FDw/X7IaagvwogOTVdZEMH6ayIfU1zHJKutB+Lj3s7kOA53umKyy7oGp4AYYpP1BX6aYKo2HP2H+ZDXUXqDT85NVlLHyNnwNTZZ4J9DX5ckqamF4E36CVjnRlPIQ+GSreSCni+EfiBlxkIbCA/AuvApng6lKOct3wN+wrgdyOgccfF0oDalVwY3wIsT0bwe/w8PJ6qWcO8Gb/AAvwEvgAzjDR4NaHgwJB++sqc3hV3guWR1lMvbmpyYryz6AL2C5ZPVKn+evh/wu3Bm8sQPd1gPoEPC/5yart7TfwSrJ6qgVQKdnJivLPgF3XehmsNpU5cNFwBUwJSlnTl8XJas3wGd7P7vJ+nkT6NTCrl4GA/okWBRc0tegTp/C/bAsXAv6OhGUD+oSGwYLeqCJDGgT69Pg8ujQWYqAXw+mgMedHW9Ql8PcPJ7/Gf4Cr7kNIhQMk6jF/ucGsCzWygucDS8wNmyJNoB++RC7gAO3AfD/zma/3GSeMwRc5qpSZ7bYHe4DM4aTciWU8qsHTBG/gUvQpMaqJ+AzqMqH3tzB3Z6swXKCbgUfyvpc0K7gCWtwXlvD3WAsfQnmunUg5NP61Icmqyi7F32elaws2wwcrCHxFTwC/Svkgz4O30OEVdLqcA3kZ87gNbkaR7ZE94KOHZCB765cAGy9TD3+Di0Bzp4zPC/Y4BqH5sLnwVL5OfgAj0K+kzGZXwBDVqklweV+HZbxwEwtBV7szW70ADKGvJGVx3JlUjd9+B+bjoXAwbq5TFsh49ZKYuK/ywNttAd4UzdDlVx2001oHPh/VyI6oYij7UHbbrxKNgtmBGO2sU4GndZl+ejhIiSipjpDW878HbkzOqP+Ohzq1LBavL2orsk0xVhrfQArg+nGODTeFgfrsrntChgD+rL8VcnZdwZbdTNbgU6PSlZZ5stIvuJm8C0wtD48BpHs5TSo0lNgCW0lu1+d1r1HRAn03aRu6dRK4Gz73x08UCHftz3vZmqsjcCLqoq5s2O6eCVZg7UWmK78f3+F8JxpzCLRWpFo8626ucm8Zcz5fttU0baNStZ/Mh+aZlZMVkvZYRgbBny83dlNeyNzYRu5efyyoK+NPYCsMPqy5neWXa9O8v2glaPL9xlLpL6iH/QLhYMulLS2WgP6B/hk72drWZHyA7Rh9WE7yQbzDHBApgo/hSiXw5tY1ixxTbK/ZfMU8HVBX5EPHai+bA6sMo06KHOZgRs5zmXwI0/I5fDzmUnY8yZr3zGqvgrYD/o2ZxL2vw5wHwgZJr7WGpee/xYuhNru2t1q02gKMc+ZrOukE7+5+Man88lgBxNylqaBO/QWsG2r6058OLsdOyZ9vQ/xUvav7CzsXvz213bLHwQOZEKyeoO3n3MDtH1j2xN8MDvsgvySYHxsmqz2siMxNypnz5moqxyDZGUxLAoxaTxYIbrK5jVKntWi6l2mqWx8h3x5mqXmyrIZ+Hha5WIV9WoAAAAASUVORK5CYII=">--></h3>
					<p class="paragrafo">A <b>dedetizadora Dynamis</b> atua no mercado há mais de 12 anos. Localizada na cidade de Praia Grande, atende a toda a Baixada Santista e São Paulo, Capital.</p>
					<p class="paragrafo">Contamos com uma equipe especializada e pronta para atender a qualquer solicitação, seja para empresas, comércios ou residências.</p>
					<p class="paragrafo">Temos como objetivo prestar serviços com a mais alta qualidade e com total comprometimento com nossos clientes.</p>
			</div>
		
		</div>

		<div class="row mb-5">

			<div class="escuro col-lg-4 col-xs-12">
					<h3 id="item2" class="my-4 text-center corTitulo">Missão <!--<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAIySURBVFhH7Zg9yE1xHIAvYkSRLIjBpiiySJkMBgb5GDAYSUlkMMggJMXArJfIt1BSNlKISckgBpsiKfkIz3Pu+dXBueejl/f8033qqf///76n+3Q+7jnn9oYM+c+YiVP7wzR5hR/wGM5yITXe40f8gV9wBBdgMhh4FhfhOfyK3/E2rsDOicBgDp5B96iewk6JwHG4HI37hMZ5fq7HTjHwBT7HOA8v4Eocj51joGEG7sYZmBQGXkMPcZL8fpEkxzBwtAwDR8Mk9D58NZslhnG30O9A773bMBmKcYfxPiYTWYw74AJMxjGJnIA+eO7NZn9SFhc0ifTJ24eJddmsJcadRz9cj2CRqrigKtK4x+j233AzNqYYdwIv5+OIbBIXlEVGnGu78CkauQlrKcYdR2/6BkXkUbyZj+viAiPvoUF78FE+3ooyHRtFlsUFxcg2cUFEum0xLqiNrIqTqsO6FCf2h7/gW93c/jCj7sIZGGmcLzhN4g66kGOUh9wPfICzMViFb/EdrnEhZwo+xFaRp7FJnL7BHTgfjXLNvfIZDVqNh9CA1/gyH/t1NQ9Pov/rdk0i17rwBN0TdYd1Az7L5+r7xk50u8VoTPztOk5Dr9hL+Zoa5b16GdYdbs/Z/dmshEHnnC8+G/EOLnGhgDEXMaKLbEcvsoXZrE/dOTmQqgvib9M6cizjgsaRXcQFtZFdxgUDI41re/v6V5RGXsEU4oJi5BYX7uI+Bwlh5A3055OU6fV+AqqE1Xw88rJ8AAAAAElFTkSuQmCC">--></h3>
					<p class="paragrafo">Prestar serviços de controle de pragas urbanas, higienização e desinfecção de reservatórios de água, serviços com excelência em atendimento, segurança e eficiência, respeitando o meio ambiente e satisfazendo as expectativas de nossos clientes, fornecedores e colaboradores.</p>
			</div>
					
			<div class="claro col-lg-4 col-xs-12">
					<h3 id="item3" class="my-4 text-center corTitulo">Visão <!--<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAALrSURBVFhH7ZjLq41hFIe3+4yJe3It1z8AucSUGMmISBkTcj9TEaWM3SNDEYYUcgnhfxAjTNzvz1P7rXW+875fe++zT8dg/+qpt+9d3/re61pr70ZPPfXUU2M0LILVsKGJ7YUwCoZF8+EQPILP8LeAfdpo6ztDrlVwB/5AbkB1+M5tWAld1xS4Cp0MrIo+rsAk6IrWwjuofugX3IPdsBT84Jgmtn22C+6CttX338IaGJS2wQ+Ijr/ACWhnBSbCMaieV31vhY60E6pbehNmQKeaBtch+vQbO6AtrYe4Lba9iSMgpyVg/4UmthdDTvrYCz8h+l8HLWkufIT48hbIaQKULk+6DNrktBniInyAOVCrcfAC4oe2Q05++DVE2xyvoDRIJx4n9xwcQ1FHITo/DSVdg2jr5XnYxHbscyVLOgnR9jBk5fJGxy/BkJGT5yvO/DHMhKRZ8ARSv7amvpxMh3HXvOnZrT4P0eEKKMlZJlsnFQeX5LOvkOwOQknLIE7YsfSTzr5DMrgIdYqTeeCDgtzuZHfOBzWyP9k6ln6Trg7wLNRpKAbooiTbAQNU1S122UuKW+w2DnCGPIdxiw9ASRYQcYuzk5kNMRV55Uv1nPVfdOiFcEBJtp9C6te2dEnGgqEo2TqG6KufjkAyFENASQboaOtqpTATV04uQUlnINqahYoySLpyydiZl5K5wTfOvERdoDbfR9tn4IrWyhhk2kkvmY5MSzmNB4Nw3O7Eb7BPm5yslGKqew8es5Zk4o4vm9j3QalY8Ex6CVKxsB8WQE4joQ+if9stFwtJlkDVlbFUmg6dyttu2R99GlI2QUfy/MX4KGaO49BOwToVTsE3iL70vREGJX8ovYHoWNwWS/49YMycDB5wL5rt5WDddx/idib02bUfUK7WZchdhnbRh2GnnR1oWa7KLehkoL5zA+oyVNc0D7y1BuXqD6HIJzBXa2ulPiwyHRpSPKvprw/Pls+G7a+Pnnrq6f9Qo/EP+BWEh2d6uZAAAAAASUVORK5CYII=">--></h3>
					<p class="paragrafo">Ser a empresa lider e referência no mercado em que atua, sendo de alto padrão seus serviços realizados na cidade de Praia Grande ou regiões, proporcionando a sustentabilidade de organização garantida por sua rentabilidade.</p>
					
			</div>
		
			<div class="escuro col-lg-4 col-xs-12">
					<h3 id="item4" class="my-4 text-center corTitulo">Valores <!--<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAMeSURBVFhH7ZhLiJVlGIAnb5WKqSSkmUm5UCQRQXBhIhohuDEyiDAQr4hK7XSl4kILBIWgEFwIFnnBhSgIBdVCiKALqJgQoi7CnZTgDbw9z5l55Z0zvzPn/PONm5kHHs7/fd8573n//7ue0zHEYGcs/l7IGVicV/Ax/o3Ha/oHGuMd7Dcv4rbkTjT4XqzLJjTGfsyxJ2HbxBNrtkSCzdZ6opFgfxLqi0h4KMG6FE9wHuZZuR2Dw5jbRqOsw1z/PgbFEzT4zeRRDK5hbhuHsg9z/RoMBl8Xz8Qvkqsx2IW57SWUFZjrF2BQPMHlaF14BoP/MLf5efkac71JBcUTHIkTku7PwXjMbS+gOFlyvTtUUDzByfhRciEGdmVu82bEmZ/r38Zg8HXxq/heci4GizG3jUBxYuX6qRgUT9Dx9FbyNQymY24bhuJN5fpYH8UEr+DERqlNnkcXL8NpnZftU5WgwTYk/YLANTG3jUJxIllejw6J5oR83wl0ArVFVYIlMMFYnl7Gs+j3PMBVGLyO0QuVlO5iX+UvtHwDr3Zdf4nWm+RFvI3W5+HQg6oEnW0Hk1swOIC5zacjn6DlmNn38DyewkvokV+cKD/jr3gETTZuqpKB6OLZaMzPGqXeuYznOi+rqUrQAZ9/PvrUgl8wt+Vt0CfnMes6GnMp9oUTx/eexjlWNFMqweEYPzf/wY8x9unecP30159D4iFuxm6U7OKv0FjzG6X2OISPsMduU5VgnSO/uL3dx5ONUuv0+rmqBOsc+YM/0aUo9uhWcF00h42NUhMlu/hdNNaeRql1PJX/ixcw9vanVCXoWS7/ZbESg88xt+WD6Y9orLw1toLb4DH0sx9akalKsM5O4p27U9xBB7vjs5XTizfjrDeWC7oLfTeqEqxz3Aqm4LdozA+s6IMf8H9ci5XjtuQYDN5AY+5Ah8AszLPdg4SHBHGvzj3Ug0jQ/TGPrbouQXEo3EUXX+P/hGNwEd7qqovDQq8PJxIspVuWfI92nweBb9A2lyCTcsbuxu/wN2xlKAw4W9HJ4zo6IH8Nl+BTfLPz8ll0dDwBrqBpXQ6tnNEAAAAASUVORK5CYII=">--></h3>
					<p class="paragrafo">Excelência nas prestações de serviços, ética e respeito mutuo aos colaboradores, responsabilidade e assistência aos parceiros e fornecedores, para que possamos dar a assistência digna e necessária aos nossos clientes.</p>
			</div>

		</div>
</div>

<!-- Rodapé do site -->
<?php
	include_once ('footer.php');
?>