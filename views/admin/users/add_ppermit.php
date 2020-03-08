	<style type="text/css">
		.table-check{
			table-layout: fixed;
		}
		.table-check thead tr.blue th{
			background: #1f467a;
			color: #fff;
		}
		

		.table-check thead th{
			text-align: center !important;
			vertical-align: middle !important;
			padding: 2px 8px !important;
		}
		.table-check thead th label {
			display: block;
			margin-bottom: 0px;
			text-align: center;
		}

		.table-check thead th input[type=checkbox],
		.table-check thead th  input[type=radio]{
			text-align: center;
			width: 20px;
			height: 20px;
		}
		.table-check tbody td input[type=checkbox],
		.table-check tbody td  input[type=radio]{
			text-align: center;
			width: 18px;
			height: 18px;
		}
		.table-check .name_dep p{
			margin-top: 4px;
			margin-bottom: 0;
		}
		.table-check .name_dep input[type=checkbox]{
			float: right; 
			margin-left: 7px;
		}

	</style>


	<div style="background-color: #fff;">

		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#terms_1" aria-controls="terms_1" role="tab" data-toggle="tab">المستخدمين</a></li>
			<li role="presentation"><a href="#terms_2" aria-controls="terms_2" role="tab" data-toggle="tab">الماليات</a></li>
			<li role="presentation"><a href="#terms_3" aria-controls="terms_3" role="tab" data-toggle="tab">الادراية</a></li>
			<li role="presentation"><a href="#terms_4" aria-controls="terms_4" role="tab" data-toggle="tab">السكرتارية</a></li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane fade in active" id="terms_1">
				<table class="table table-bordered table-check">
					<thead>
						<tr class="blue">
							<th><label><input type="checkbox" name=""></label> الكل</th>
							<th style="width: 250px;">إسم الإدارة</th>
							<th><label><input type="checkbox" name=""></label> حفظ</th>
							<th><label><input type="checkbox" name=""></label> تعديل</th>
							<th><label><input type="checkbox" name=""></label> ترحيل </th>
							<th><label><input type="checkbox" name=""></label> طباعة</th>
							<th><label><input type="checkbox" name=""></label> تفاصيل</th>
							<th><label><input type="checkbox" name=""></label> حذف</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="name_dep" rowspan="2"><input type="checkbox" name=""><p class=""> المجموعات </p></td>
							<td class="name_dep"><input type="checkbox" name="" style=""><p class="">مجموعات التحكم</p></td>
							<td><input type="checkbox" name=""></td>
							<td><input type="checkbox" name=""></td>
							<td><input type="checkbox" name=""></td>
							<td><input type="checkbox" name=""></td>
							<td><input type="checkbox" name=""></td>
							<td><input type="checkbox" name=""></td>
						</tr>
						<tr>
							
							<td class="name_dep"><input type="checkbox" name="" style=""><p class=""> صفحات التحكم</p></td>
							<td><input type="checkbox" name=""></td>
							<td><input type="checkbox" name=""></td>
							<td><input type="checkbox" name=""></td>
							<td><input type="checkbox" name=""></td>
							<td><input type="checkbox" name=""></td>
							<td><input type="checkbox" name=""></td>
						</tr>
						<tr>
							<td class="name_dep" rowspan="3"><input type="checkbox" name=""><p class=""> الصلاحيات </p></td>
							<td class="name_dep"><input type="checkbox" name="" style=""><p class=""> إضافة مستخدم</p></td>
							<td><input type="checkbox" name=""></td>
							<td><input type="checkbox" name=""></td>
							<td><input type="checkbox" name=""></td>
							<td><input type="checkbox" name=""></td>
							<td><input type="checkbox" name=""></td>
							<td><input type="checkbox" name=""></td>
						</tr>
						<tr>
							
							<td class="name_dep"><input type="checkbox" name="" style=""><p class=""> صلاحيات مستخدم</p></td>
							<td><input type="checkbox" name=""></td>
							<td><input type="checkbox" name=""></td>
							<td><input type="checkbox" name=""></td>
							<td><input type="checkbox" name=""></td>
							<td><input type="checkbox" name=""></td>
							<td><input type="checkbox" name=""></td>
						</tr>
						<tr>
							
							<td class="name_dep"><input type="checkbox" name="" style=""><p class=""> إضافة مستخدم</p></td>
							<td><input type="checkbox" name=""></td>
							<td><input type="checkbox" name=""></td>
							<td><input type="checkbox" name=""></td>
							<td><input type="checkbox" name=""></td>
							<td><input type="checkbox" name=""></td>
							<td><input type="checkbox" name=""></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="terms_2">

			</div>
			<div role="tabpanel" class="tab-pane fade" id="terms_3">

			</div>
			<div role="tabpanel" class="tab-pane fade" id="terms_4">

			</div>
		</div>

	</div>