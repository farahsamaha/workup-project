<template>
  <v-container>
    <v-col>
      <job-card />
    </v-col>
  </v-container>
</template>

<script>
import JobLayout from "../../layouts/JobLayout";
import JobCard from "@/components/job/JobCard.vue";
export default {
  layout: JobLayout,
  components: { JobCard },
};
</script>

<style>
</style>
