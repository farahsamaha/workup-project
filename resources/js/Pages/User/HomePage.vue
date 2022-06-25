<template>
<div>
 <AppHero>
  </AppHero>
    <JobCategories>
    </JobCategories>
    <TopCompanies>
    </TopCompanies>
      <BannerSec>
      </BannerSec>
  <PeopleReviews>
  </PeopleReviews>
  <FooterSec>
  </FooterSec>

</div>
</template>

<script>
import AppHero from '@/components/Home/AppHero.vue'
import JobCategories from '@/components/Home/JobCategories.vue'
import BannerSec from '@/components/Home/BannerSec.vue'
import PeopleReviews from '@/components/Home/PeopleReviews.vue'
import FooterSec from '@/components/layout/FooterSec.vue'
export default {
  components: {
    AppHero,
    JobCategories,
    BannerSec,
    PeopleReviews,
    FooterSec
  }
}
</script>

<style scoped>
/* @import url('https://fonts.googleapis.com/css2?family=Teko:wght@300&display=swap');
.text-h1{
 font-family: 'macondo';
} */
</style>
