<template>
  <div id="contentsWrap">
		<section id="mv">
			<h1>
				<img src="common/img/img_mv.png" alt="dummy" class="pc">
				<img src="common/img/sp/img_mv.png" alt="dummy" class="sp">
			</h1>
		</section>
		
    <router-view v-bind:form.sync="form"></router-view>
  </div>
</template>

<script>
export default {
  data() {
    return {
			form:{
				name_sei: null,
				name_mei: null,
				kana_sei: null,
				kana_mei: null,
				zip1: null,
				zip2: null,
				prefecture: null,
				address: null,
				building: null,
				email: null,
				tel1: null,
				tel2: null,
				tel3: null,
				q1: null,
				q1_other: null,
				q2: null,
				q2_other: null,
				q3: null,
				check_policy: null
			},
    };
  }
};
</script>