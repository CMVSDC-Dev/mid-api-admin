<script setup lang="ts">
import { ref } from 'vue'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import BreadcrumbDefault from '@/Components/Breadcrumbs/BreadcrumbDefault.vue'
import ProfileCard from '@/Components/ProfileCard.vue'

const pageTitle = ref('Profile')
</script>

<template>
  <Head :title="pageTitle" />

  <AuthenticatedLayout>
      <!-- Breadcrumb Start -->
      <BreadcrumbDefault :pageTitle="pageTitle" />
      <!-- Breadcrumb End -->

      <!-- Main Content Start -->
      <ProfileCard />
      <!-- Main Content End -->

  </AuthenticatedLayout>
</template>
