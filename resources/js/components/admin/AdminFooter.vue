<template>
	<footer class="footer">
		<!-- <div class="field created-at"> {{ createdAtDisplay }}</div> -->
		<span class="text-right">
		Copyright <a target="_blank" href="#">TPACK</a>
		</span>
		<span class="float-right">
			<span style="color: black;">Hôm nay: {{date}}/{{month}}/{{year}} {{hour}}:{{minute}}:{{ second }}</span>
		<router-link target="_blank" to="/"><b>TPACK</b></router-link>
		</span>
	</footer>
</template>

<script>
	export default {
		data(){
			return {
				date : '',
				month : '',
				year : '',
				hour : '',
				minute : '',
				second: '',
			}
		},
		mounted(){
			setInterval(this.clock, 1000)
		},
		methods: {
			clock() {
				var time = new Date()
				this.date = time.getDate()
				this.month = time.getMonth() + 1 //Be careful! January is 0 not 1
				this.year = time.getFullYear()
				this.hour = time.getHours()
				this.minute = time.getMinutes()
				this.second = time.getSeconds()
			}
		}
	}
</script>
<!-- <script>
	export default {
		data(){
			return {
				now: ''
			}
		},
		mounted(){
			this.now = this.getNow()
			console.log(this.getNow())
		},
		computed: {
  createdAtDisplay() {
    return moment(todo.created_at).format('YYYY-MM-DD h:mm A');
  }
},
		methods:{
			getNow: function () {
		    	var currentDate = new Date();
		    	var date = currentDate.getDate();
				var month = currentDate.getMonth(); //Be careful! January is 0 not 1
				var year = currentDate.getFullYear();
				var hour = currentDate.getHours();
				var minute = currentDate.getMinutes();
				var second = currentDate.getSeconds();

				// return dateString = date + "-" +(month + 1) + "-" + year;
				return date + "/" +(month + 1) + "/" + year + hour + ":" + minute + ":" + second;
	  		}
		}
	}
</script> -->