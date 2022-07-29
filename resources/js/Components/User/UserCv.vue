<template>
  <v-card class="pa-2" outlined tile>
    <v-list>
      <v-list-group prepend-icon="mdi-ticket" color="teal-accent-4" no-action>
        <template v-slot:activator>
          <v-list-item-content>
            <v-list-item-title>Skills</v-list-item-title>
          </v-list-item-content>
        </template>
        <v-list-item v-for="skill in skills.data" :key="skill.id">
          {{ user.skill_id }}
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
        <v-list-item
          v-for="certificate in certificate.data"
          :key="certificate.id"
        >
          {{ user.certificate_id }}
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
        <v-list-item v-for="experience in experience.data" :key="experience.id">
          {{ user.experience_id }}
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
          v-for="organization in organization.data"
          :key="organization.id"
        >
          {{ user.organization_id }}
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
