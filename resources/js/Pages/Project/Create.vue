<template>
<Head  title="Add project"/>
<AuthenticatedLayout>
<template #header>
Add new project
</template>
<div class="mb-4 inline-flex w-full overflow-hidden rounded-lg bg-white shadow-md">
            <div class="flex w-12 items-center justify-center bg-blue-500">
                <svg class="h-6 w-6 fill-current text-white" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"></path>
                </svg>
            </div>
    
            <div class="-mx-3 px-4 py-2">
                <div class="mx-3">
                    <span class="font-semibold text-blue-500">Create</span>
                    <p class="text-sm text-gray-600">A new project</p>
                </div>
            </div>
        </div>
        <form class="w-full"  @submit.prevent="submit">
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="sm:col-span-3">
            <label for="project-title" class="block text-sm font-medium leading-6 text-gray-900">Project Title</label>
            <div class="mt-2">
              <input type="text" v-model="form.title" id="project-title" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              <InputError class="mt-2" :message="form.errors.title" />
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="project-url" class="block text-sm font-medium leading-6 text-gray-900">Project Url</label>
            <div class="mt-2">
              <input type="text" v-model="form.url" id="project-url" autocomplete="url" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              <InputError class="mt-2" :message="form.errors.url" />
            </div>
          </div>
          <div class="sm:col-span-3">
            <label for="ip-address" class="block text-sm font-medium leading-6 text-gray-900">Project Ip_address</label>
            <div class="mt-2">
              <input type="text" v-model="form.ipAddress" id="ip-address" autocomplete="ip-address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              <InputError class="mt-2" :message="form.errors.ipAddress" />
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="admin-name" class="block text-sm font-medium leading-6 text-gray-900">Project Admin Name</label>
            <div class="mt-2">
              <input type="text" v-model="form.adminName" id="admin-name" autocomplete="ip-address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              <InputError class="mt-2" :message="form.errors.adminName" />
            </div>
          </div>
          <div class="sm:col-span-3">
            <label for="admin-email" class="block text-sm font-medium leading-6 text-gray-900">Project Admin email</label>
            <div class="mt-2">
              <input type="email" v-model="form.adminEmail" id="admin-email" autocomplete="ip-address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              <InputError class="mt-2" :message="form.errors.adminEmail" />
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="admin-email" class="block text-sm font-medium leading-6 text-gray-900">Project Admin Password</label>
            <div class="mt-2">
              <input type="password" v-model="form.password" id="password" autocomplete="ip-address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              <InputError class="mt-2" :message="form.errors.password" />
            </div>
          </div>
        </div>
        <PrimaryButton class="my-2" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Add Project
        </PrimaryButton>
    </form>

</AuthenticatedLayout>
</template>
<script setup>
import { Head , useForm} from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
const form = useForm({
    title : null,
    url : null,
    ipAddress:null,
    adminName:null,
    adminEmail:null,
    password:null

})
const submit = () => {
    form.post(route('projects.store'), {
        onSuccess: () => form.reset(),
    });
};
</script>