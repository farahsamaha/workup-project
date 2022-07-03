<template>
  <div>
    <AppHero> </AppHero>
    <JobCategories> </JobCategories>
    <BannerSec> </BannerSec>
    <FooterSec> </FooterSec>
  </div>
</template>

<script>
import AppHero from "@/components/home/AppHero.vue";
import JobCategories from "@/components/home/JobCategories.vue";
import BannerSec from "@/components/home/BannerSec.vue";
import AuthenticatedLayout from "../../layouts/AuthenticatedLayout";

export default {
  layout: AuthenticatedLayout,
  components: {
    AppHero,
    JobCategories,
    BannerSec,
  },
};
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Teko:wght@300&display=swap');
.text-h1{
 font-family: 'macondo';
}
</style>
