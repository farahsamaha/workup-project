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
import GuestLayout from "../../Layouts/GuestLayout";

export default {
  layout: GuestLayout,
  components: {
    AppHero,
    JobCategories,
    BannerSec,
  },
};
</script>
