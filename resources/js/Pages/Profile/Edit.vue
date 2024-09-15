<script setup lang="ts">
import BreadcrumbDefault from '@/Components/Breadcrumbs/BreadcrumbDefault.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import ProfileCard from '@/Pages/Profile/Partials/ProfileCard.vue';
import { ref } from 'vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';

const pageTitle = ref('Profile')
defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});
</script>

<template>
  <Head title="Profile" />

  <AuthenticatedLayout>
    <!-- Breadcrumb Start -->
    <BreadcrumbDefault :pageTitle="pageTitle" />
    <!-- Breadcrumb End -->

    <!-- Main Content Start -->
    <ProfileCard />
    <div class="mt-4 mx-auto space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-boxdark shadow sm:rounded-lg">
            <UpdateProfileInformationForm
                :must-verify-email="mustVerifyEmail"
                :status="status"
                class="max-w-xl"
            />
        </div>

        <div class="p-4 sm:p-8 bg-white dark:bg-boxdark shadow sm:rounded-lg">
            <UpdatePasswordForm class="max-w-xl" />
        </div>

        <div class="p-4 sm:p-8 bg-white dark:bg-boxdark shadow sm:rounded-lg">
            <DeleteUserForm class="max-w-xl" />
        </div>
    </div>
    <!-- Main Content End -->
  </AuthenticatedLayout>
</template>
