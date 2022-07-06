<template>
  <v-container>
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
};
</script>

<style>
</style>
