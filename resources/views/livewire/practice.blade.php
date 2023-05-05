<div class="modal min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover"
    style="background-color: rgba(128, 128, 128, 0.758);" id="modal-id">
    <div class="absolute bg-black opacity-80 inset-0 z-0"></div>
    <div class="w-full  max-w-lg p-5 relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">
        <!--content-->
        <div class="">
            <!--body-->
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="mb-4">
                        <label for="postTitle" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                        <input value="{{ $postTitle }}" type="textarea"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="postTitle" wire:model="postTitle">
                    </div>

                    <div class="mb-4">
                        <label for="postContent" class="block text-gray-700 text-sm font-bold mb-2">Content:</label>
                        <input value="{{ $postContent }}" type="textarea"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="postContent" wire:model="postContent">
                    </div>

                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <span class="flex rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <button wire:click="save({{ $postId }})" type="button"
                                class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-gray-200 text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">Save</button>
                        </span>
                        &nbsp;
                        <span class="flex rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <button wire:click="closeModal()" type="button"
                                class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-gray-200 text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">Cancel</button>
                        </span>
                    </div>
                </div>
            </form>
            <!--footer-->
            <div class="p-3  mt-2 text-center space-x-4 md:block">
                </div>
        </div>
    </div>
</div>
