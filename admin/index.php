<?php include "parts/header.php";?>
    <div class="flex">
    <div class="flex-1 overflow-y-auto p-4">
        <table class="w-full bg-white shadow-md rounded-lg">
            <thead>
                <tr>
                    <th class="py-2 px-4 bg-zinc-200">Title</th>
                    <th class="py-2 px-4 bg-zinc-200">Author</th>
                    <th class="py-2 px-4 bg-zinc-200">Published</th>
                    <th class="py-2 px-4 bg-zinc-200">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="py-2 px-4">Article 1</td>
                    <td class="py-2 px-4">John Doe</td>
                    <td class="py-2 px-4">2022-01-01</td>
                    <td class="py-2 px-4">
                        <button class="flex items-center bg-zinc-700 text-white px-2 py-1 rounded-md mr-2">
                            <i class="fas fa-edit mr-1"></i>Edit
                        </button>
                        <button class="flex items-center bg-zinc-700 text-white px-2 py-1 rounded-md">
                            <i class="fas fa-trash-alt mr-1"></i>Delete
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="py-2 px-4">Article 2</td>
                    <td class="py-2 px-4">Jane Smith</td>
                    <td class="py-2 px-4">2022-01-05</td>
                    <td class="py-2 px-4">
                        <button class="flex items-center bg-zinc-700 text-white px-2 py-1 rounded-md mr-2">
                            <i class="fas fa-edit mr-1"></i>Edit
                        </button>
                        <button class="flex items-center bg-zinc-700 text-white px-2 py-1 rounded-md">
                            <i class="fas fa-trash-alt mr-1"></i>Delete
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="py-2 px-4">Article 3</td>
                    <td class="py-2 px-4">Alex Johnson</td>
                    <td class="py-2 px-4">2022-01-10</td>
                    <td class="py-2 px-4">
                        <button class="flex items-center bg-zinc-700 text-white px-2 py-1 rounded-md mr-2">
                            <i class="fas fa-edit mr-1"></i>Edit
                        </button>
                        <button class="flex items-center bg-zinc-700 text-white px-2 py-1 rounded-md">
                            <i class="fas fa-trash-alt mr-1"></i>Delete
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
        <button class="mt-4 bg-zinc-700 text-white px-3 py-2 rounded-md">
            <i class="fas fa-plus mr-2"></i>Add New Article
        </button>
    </div>
</div>