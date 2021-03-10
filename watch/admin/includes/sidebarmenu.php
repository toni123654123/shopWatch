<div class="sidebar-menu">
	<header class="logo1">
		<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a>
	</header>
	<div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
	<div class="menu">
		<ul id="menu">
			<li>
				<a href="index.php?c=admin" class="link_item"><i class="fa fa-tachometer"></i> <span>Dashboard</span>
					<div class="clearfix"></div>
				</a>
			</li>

			<li id="menu-academico">
				<a href="index.php?c=admin&a=product" class=" link_item"><i class="fa fa-list-ul" aria-hidden="true"></i><span>Sản phẩm</span> </span>
					<div class="clearfix"></div>
				</a>
			</li>

			<li id="menu-academico">
				<a href="index.php?c=admin&a=category" class="link_item"><i class="fa fa-globe" aria-hidden="true"></i><span>Danh mục</span> </span>
					<div class="clearfix"></div>
				</a>
			</li>
			<?php
			if (isset($_SESSION['data'])) {
				if ($_SESSION['data'][0]['adRole'] == "2") { ?>

				<?php	} else { ?>
					<li id="menu-academico">
						<a href="index.php?c=admin&a=user" class="link_item"><i class="fa fa-users" aria-hidden="true"></i><span>Thành viên</span> </span>
							<div class="clearfix"></div>
						</a>
					</li>
			<?php }
			} ?>


			<li>
				<a href="index.php?c=admin&a=order" class="link_item"><i class="fa fa-table"></i> <span>Đơn hàng</span>
					<div class="clearfix"></div>
				</a>
			</li>
		</ul>
	</div>
</div>

<script>
	document.addEventListener("DOMContentLoaded", function() {
		var path = window.location.href;
		var folerpath = path.split("/")[3];
		var folderpath = folerpath.split("=")[2];
		var pathname = "";
		//console.log(folderpath);
		$(".menu a").each(function(index) {
			var menupath = $(this).attr("href");
			var menufolerpath = menupath.split("=")[2];
			//console.log(menufolerpath);
			if (folderpath == menufolerpath) {
				$(this).addClass("active");
				$(".menu a[href='" + $(this).attr("href") + "']").addClass("active");
				pathname = $(this).text();
			}
		});

		function titleadd(add = '') {
			var title = location.hostname.split(".")[0].toUpperCase();
			if (add != '') {
				title = title + " | " + add;
			}
			document.title = title;
		}
		var query = (window.location.href + "?").split("?")[1];
		var result = query.split("=")[3];


		if (result == undefined) {
			titleadd(pathname);
		} else {
			titleadd(pathname + " > " + result);
		}

	});
</script>