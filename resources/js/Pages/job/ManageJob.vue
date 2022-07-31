<template>
  <v-container>
    <v-toolbar flat elevation="0">
      <v-toolbar-title class="orange--text">My Jobs</v-toolbar-title>
      <v-divider class="mx-9" inset vertical></v-divider>
    </v-toolbar>
    <v-container>
      <v-simple-table>
        <template v-slot:default>
          <thead>
            <tr>
              <th class="text-left">job title</th>
              <th class="text-left">actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="job in jobs.data" :key="job.id">
              <td :job="job">
                {{ job.title }}
              </td>
              <td>
                <v-icon small class="mr-2" @click.prevent="updateJob()">
                  mdi-pencil
                </v-icon>
                <v-icon class="mx-2" small @click.prevent="deleteItem()">
                  mdi-delete
                </v-icon>
                <v-icon class="mx-2" small @click.prevent="showJob()">
                  mdi-eye
                </v-icon>
                <!-- <v-icon class="mx-2" small @click.prevent="applyItem()">
                  mdi-account
                </v-icon> -->
              </td>
            </tr>
          </tbody>
        </template>
      </v-simple-table>
    </v-container></v-container
  >
</template>

<script>
import JobLayout from "../../Layouts/JobLayout";
export default {
  layout: JobLayout,
  props: ["jobs"],
  data() {
    return {
      job: "",
    };
  },
  mounted() {
    console.log(this.jobs);
  },

  methods: {
    updateJob() {
      this.loading = true;
      this.$inertia.patch(`/jobs/${this.job.id}`, this.form);
    },
    deleteJob() {
      if (confirm("Are you sure you want to delete this job?")) {
        this.$inertia.delete(`/jobs/${this.job.id}`);
      }
    },
    showJob() {
      // this.$inertia.get(route("showjob"));
      this.$inertia.get(`/jobs/${this.job.id}`);
    },
  },
};
</script>





