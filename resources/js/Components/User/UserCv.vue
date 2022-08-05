<template>
  <v-card class="pa-2" elevation="2">
    <v-list>
      <v-list-group prepend-icon="mdi-ticket" color="teal-accent-4" no-action>
        <template v-slot:activator>
          <v-list-item-content>
            <v-list-item-title>Skills</v-list-item-title>
          </v-list-item-content>
        </template>
        <v-list-item v-for="skill in skills.data" :key="skill.id">
          {{ user.skills.map((skill) => skill.name).join(",") }}
          <v-list-item-content>
            <v-list-item-title v-text="child.title"></v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list-group>

      <v-list-group prepend-icon="mdi-school" color="teal-accent-4" no-action>
        <template v-slot:activator>
          <v-list-item-content>
            <v-list-item-title>Education</v-list-item-title>
          </v-list-item-content>
        </template>
        <v-list-item v-for="certificate in certificates" :key="certificate.id">
          {{
            user.certificates.map((certificate) => certificate.name).join(",")
          }}
          <!-- {{ user.certificate_id }} -->
          <v-list-item-content>
            <v-list-item-title v-text="child.title"></v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list-group>

      <v-list-group
        prepend-icon="mdi-briefcase"
        color="teal-accent-4"
        no-action
      >
        <template v-slot:activator>
          <v-list-item-content>
            <v-list-item-title>Experience</v-list-item-title>
          </v-list-item-content>
        </template>
        <v-list-item v-for="experience in experiences" :key="experience.id">
          {{ user.experiences.map((experience) => experience.name).join(",") }}
          <!-- {{ user.experience_id }} -->
          <v-list-item-content>
            <v-list-item-title v-text="child.title"></v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list-group>

      <v-list-group
        prepend-icon="mdi-bottle-tonic-plus"
        color="teal-accent-4"
        no-action
      >
        <template v-slot:activator>
          <v-list-item-content>
            <v-list-item-title>Volunteering</v-list-item-title>
          </v-list-item-content>
        </template>
        <v-list-item
          v-for="organization in organizations"
          :key="organization.id"
        >
          {{
            user.organizations
              .map((organization) => organization.name)
              .join(",")
          }}
          <!-- {{ user.organization_id }} -->
          <v-list-item-content>
            <v-list-item-title v-text="child.title"></v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list-group>
    </v-list>
  </v-card>
</template>

<script>
export default {
  props: {
    user: Object,
  },
  computed: {
    skills() {
      return this.$page.props.skills;
    },
    certificate() {
      return this.$page.props.certificate;
    },
    experience() {
      return this.$page.props.experience;
    },
    organization() {
      return this.$page.props.organization;
    },
  },
};
</script>
