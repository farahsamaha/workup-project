<template>
  <v-container>
       <!-- <div class="container">
      <div v-if="Message" class="alert alert-success mt-4">
        {{ Message }}
      </div>
       </div> -->

    <v-col>
        <search-filter/>
      <job-card />
    </v-col>
  </v-container>
</template>

<script>
import JobLayout from "../../layouts/JobLayout";
import JobCard from "@/components/job/JobCard.vue";
import SearchFilter from "@/components/job/SearchFilter.vue"
export default {
  layout: JobLayout,
  components: { JobCard , SearchFilter },
   props: ['jobs', 'Message'],
};
</script>

<style>
</style>
