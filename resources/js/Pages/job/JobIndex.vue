<template>
  <v-container>
    <!-- <div class="container">
      <div v-if="Message" class="alert alert-success mt-4">
        {{ Message }}
      </div>
    </div> -->

    <v-col>
      <search-filter
        :categories="categories"
        :locations="locations"
        :types="types"
      />

      <v-row align-content="center" justify="center" class="mt-5">
        <v-col cols="8" v-for="job in jobs.data" :key="job.id">
          <job-card class="ml-16" :job="job" />
        </v-col>
      </v-row>
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
import JobLayout from "../../Layouts/JobLayout";
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
  props: ["jobs", "Message", "types", "locations", "categories"],

  mounted() {
    console.log(this.jobs);
  },
};
</script>

<style>
</style>
