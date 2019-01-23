<template>
	<div>
		<p>Nội dung giới thiệu <br>
			<span v-on:click="click" style="cursor: pointer;">
				<i class="fa fa-thumbs-o-up" aria-hidden="true" v-if="like == 1" style="color: blue"></i>
				<i class="fa fa-thumbs-o-up" aria-hidden="true" v-if="like == 0" style="color: grey"></i>
			</span>
		</p>
		<h3>Trạng thái like: {{ like }}</h3>
		<div v-html="string"></div>
	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12 wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="300ms">
					<h2>GIỚI THIỆU</h2>
				    <p>TPACK (Technological Pedagogical Content Knowledge) là mô hình xác định<br>những kiến thức mà người dạy cần có để có thể giảng dạy hiệu quả với sự hỗ trợ của CNTT. </p>
				    <p align="justify">Ý tưởng về mô hình này đã nảy sinh trên cơ sở của nhiều công trình nghiên cứu, trong đó có mô hình Pedagogical Content Knowledge (PCK) của Lee Shulman (1986). Rất nhiều công trình nghiên cứu đã nêu ra rằng CNTT không thể được xem là một thành tố độc lập trong quá trình dạy-học. Hoạt động dạy-học hiệu quả cần có sự kết hợp CNTT với phương pháp sư phạm và kiến thức chuyên môn</p>
				    <p align="justify">Mô hình TPACK gồm có 3 thành tố chính đan xen lẫn nhau như sơ đồ dưới đây:<br><br></p>
				    <div align="justify">
				        <div style="text-align: center"><img src="images/intro/introTpack.png" alt=" " width="400" height="389"></div>
				        <br>
				        <div>Ba thành tố chính của TPACK được thể hiện bằng 3 vòng tròn, mỗi vòng tròn là một mảng kiến thức quan trọng của GV: kiến thức về lĩnh vực dạy-học (CK –<br>Content Knowledge), kiến thức về phương pháp sư phạm (PK – Pedagogical Knowledge) và kiến thức về CNTT (TK – Technological Knowledge). </div>
				        <div>Ba mảng kiến thức khi kết hợp lại với nhau sẽ tạo một mô hình tổng hợp về năng lực cần có của GV gọi là TPACK (Technological Pedagogical Content Knowledge). Mô hình TPACK cũng đề cập đến các dạng kiến thức mới hình thành do sự tương tác của 3 mảng kiến thức trên:</div>
				        <div>1 - Kiến thức phương pháp sư phạm sử dụng trong lĩnh vực dạy-học (PCK – Pedagogical Content Knowledge).<br>2 - Kiến thức về các công cụ CNTT chuyên dùng trong lĩnh vực dạy-học (TCK – Technological Content Knowledge).<br>3 - Kiến thức về các công cụ CNTT hỗ trợ những ý tưởng, phương pháp dạy-học cụ thể (TPK – Technological Pedagogical Knowledge). </div>
				        <div>Để việc ứng dụng CNTT vào dạy-học có hiệu quả, người GV cần có cả 3 mảng kiến thức trên, nhưng việc vận dụng, mức độ tham gia của từng khối kiến thức<br>trong những hoàn cảnh, bài học cụ thể phải linh hoạt.</div>
				        <div>&nbsp;</div>
				        <div><strong>Sử dụng mô hình TPACK</strong></div>
				        <div>Mô hình TPACK là một khung lý thuyết giúp các nhà giáo dục và quản lý thiết kế những hệ thống dạy-học và đào tạo hiệu quả hơn.</div>
				        <div>Trước hết, mô hình TPACK chỉ ra sự kém hiệu quả của những mô hình đào tạo mà GV chỉ đơn giản tập trung vào một loại năng lực nào đó. Mô hình này chính là cơ sở cho việc phân tích kiến thức, năng lực GV và từ đó có những giải pháp đào tạo GV đáp ứng yêu cầu dạy-học của thế kỉ 21. Ngoài ra, TPACK cũng tạo cơ sở để GV thiết kế những hoạt động học tập hiệu quả hơn. TPACK đã chỉ ra là việc học đạt hiệu quả cao nhất khi thầy trò cùng sử dụng sức mạnh của CNTT để khám phá tri thức trong môi trường học tập có gắn kết chặt chẽ với thực tiễn.</div>
				        <div>&nbsp;</div>
				        <div>TPACK có thể hỗ trợ GV thiết kế và đánh giá một hoạt động học tập hiệu quả bằng cách nêu ra những câu hỏi liên quan đến các thành tố của mô hình TPACK, như:</div>
				        <ol>
				            <li>Ý tưởng dạy-học trong hoạt động học tập này có gắn với mục tiêu của bài học không? (CK)</li>
				            <li>Phương pháp sư phạm nào hỗ trợ tốt nhất cho ý tưởng dạy-học này? (PCK)</li>
				            <li>Các công cụ CNTT cần được sử dụng như thế nào để giúp người học lĩnh hội kiến thức hiệu quả nhất? (TCK)</li>
				            <li>Với phương pháp sư phạm mà GV muốn sử dụng thì công cụ CNTT nào sẽ hỗ trợ hiệu quả nhất? (TPK)</li>
				            <li>GV cần biết công cụ CNTT nào để triển khai hoạt động học tập này? (TK)</li>
				            <li>Tất cả các yếu tố trên cần được phối hợp thế nào để hoạt động học tập đạt hiệu quả cao nhất? (TPACK)</li>
				        </ol>
				    </div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	
	</div>
	<!-- /section -->
	</div>
</template>

<script>
	export default {
		data() {
			return {
				like: 0,
				string: '<h1 style="color: blue">hahaha</h1>'
			}
		},
		methods: {
			click(){
				var vm = this;
				axios.get("api/demolike/" + this.like).then(function (response) {
					console.log("data:" + response.data.rs); 
					if(response.data.rs) {
						vm.like = 1; console.log(response.data.rs + "like: " + vm.like);
					}
					else {
						vm.like = 0;
						console.log(response.data.rs);
					}
				})
			}
		}
	}
</script>