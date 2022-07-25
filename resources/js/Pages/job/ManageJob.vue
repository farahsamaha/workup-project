<template>
  <v-container>
    <v-toolbar flat elevation="0">
      <v-toolbar-title class="orange--text">My Jobs</v-toolbar-title>
      <v-divider class="mx-9" inset vertical></v-divider>
      <!-- <v-dialog v-model="dialogDelete" max-width="500px">
        <v-card>
          <v-card-title class="text-h5"
            >Are you sure you want to delete this item?</v-card-title
          >
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn color="blue darken-1" text @click="closeDelete"
              >Cancel</v-btn
            >
            <v-btn color="blue darken-1" text @click="deleteItemConfirm"
              >OK</v-btn
            >
            <v-spacer></v-spacer>
          </v-card-actions>
        </v-card>
      </v-dialog> -->
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
                <v-icon small class="mr-2" @click.prevent="updateJob(item)">
                  mdi-pencil
                </v-icon>
                <v-icon class="mx-2" small @click.prevent="deleteItem(item)">
                  mdi-delete
                </v-icon>
                <v-icon class="mx-2" small @click.prevent="showJob(item)">
                  mdi-eye
                </v-icon>
                <!-- <v-icon class="mx-2" small @click.prevent="applyItem(item)">
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
  data: () => ({
    dialog: false,
    dialogDelete: false,
    job: "",
  }),
  mounted() {
    console.log(this.jobs);
  },
  watch: {
    dialog(val) {
      val || this.close();
    },
    dialogDelete(val) {
      val || this.closeDelete();
    },
  },
  methods: {
    updateJob() {
      this.loading = true;
      this.$inertia.patch(`/jobs/${this.job.id}`, this.form).then(() => {
        this.loading = false;
      });
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

  deleteItemConfirm() {
    this.jobs.splice(this.editedIndex, 1);
    this.closeDelete();
  },

  close() {
    this.dialog = false;
    this.$nextTick(() => {
      this.editedItem = Object.assign({}, this.defaultItem);
      this.editedIndex = -1;
    });
  },

  closeDelete() {
    this.dialogDelete = false;
    this.$nextTick(() => {
      this.editedItem = Object.assign({}, this.defaultItem);
      this.editedIndex = -1;
    });
  },
};
</script>





