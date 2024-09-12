<script setup lang="ts">
import { ref } from 'vue'
import BreadcrumbDefault from '@/Components/Breadcrumbs/BreadcrumbDefault.vue'
import SettingsCard from '@/Components/SettingsCard.vue'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'

const pageTitle = ref('Settings Page')
</script>

<template>
  <AuthenticatedLayout>
    <div class="mx-auto max-w-270">
      <!-- Breadcrumb Start -->
      <BreadcrumbDefault :pageTitle="pageTitle" />
      <!-- Breadcrumb End -->
      <SettingsCard />
    </div>
  </AuthenticatedLayout>
</template>
