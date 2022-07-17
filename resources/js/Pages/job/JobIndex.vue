<template>
  <v-container>
    <!-- <div class="container">
      <div v-if="Message" class="alert alert-success mt-4">
        {{ Message }}
      </div>
       </div> -->

    <v-col>
      <search-filter />

      <!-- <div v-for="job in jobs" :key="job.id"> -->
      <job-card />
      <!-- </div> -->
      <div class="text-center">
        <v-pagination
          color="orange"
          class="mt-16"
          v-model="page"
          :length="4"
          :links="jobs.links"
          circle
        ></v-pagination>
      </div>
    </v-col>
  </v-container>
</template>

<script>
import JobLayout from "../../layouts/JobLayout";
import JobCard from "@/components/job/JobCard.vue";
import SearchFilter from "@/components/job/SearchFilter.vue";
export default {
  layout: JobLayout,
  components: { JobCard, SearchFilter },
  data() {
    return {
      page: 1,
    };
  },
  props: ["jobs", "Message"],
};
</script>

<style>
</style>
