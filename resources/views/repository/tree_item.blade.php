
<div class="tree_suite"
     data-suite_id="{{$suite->id}}"
     data-parent_id="{{$suite->parent_id}}">

    <div class="tree_test_suite_content d-flex justify-content-between">

        <div>
            <i class="bi bi-folder2 fs-4"></i>
            <span><b class="tree_suite_title_{{$suite->id}}">{{$suite->title}}</b></span>
        </div>

        <div class="col-auto d-md-flex justify-content-md-end">
            <button class="btn add_test_case_btn px-1" type="button" title="Add test case"
                    onclick="renderTestCaseCreateForm('{{$suite->id}}')">
                <i class="bi bi-file-earmark-plus"></i>
            </button>

            <button class="btn create_child_folder_btn px-1" type="button" title="Add Subsection"
                    onclick="renderTestSuiteEditor('create', {{$suite->repository_id}}, {{$suite->id}})">
                <i class="bi bi-folder-plus"></i>
            </button>

            <button class="btn edit_folder_btn px-1" type="button" title="Edit"
                    onclick="renderTestSuiteEditor('update', {{$suite->repository_id}}, {{$suite->id}})">
                <i class="bi bi-pencil"></i>
            </button>

            <button class="btn delete_folder_btn px-1" type="button" title="Delete" onclick="deleteTestSuite({{$suite->id}})">
                <i class="bi bi-trash3"></i>
            </button>
        </div>

    </div>

    <div class="tree_suite_test_cases">
        @foreach($suite->testCases as $testCase)

            <div class="tree_test_case" data-test_case_id="{{$testCase->id}}">
                <div class='tree_test_case_content d-flex justify-content-between'>

                    <div class='tree_test_case_click'
                         onclick="renderTestCase('{{$testCase->id}}')">
                        <span>
                            @if($testCase->automated)
                                <i class="bi bi-robot"></i>
                            @else
                                <i class="bi bi-person"></i>
                            @endif
                        </span>
                        <span class="text-muted ps-2 test_case_id">{{$repository->prefix}}-{{$testCase->id}}</span>
                        <span class="tree_case_title">{{$testCase->title}}</span>
                    </div>

                    <div class="tree_test_case_controls">
                        <button class="btn p-0 px-1" type="button" title="Edit"
                                onclick="renderTestCaseEditForm('{{$testCase->id}}')">
                            <i class="bi bi-pencil"></i>
                        </button>

                        <button class="btn p-0 px-1" type="button" title="Delete" onclick="deleteTestCase({{$testCase->id}})">
                            <i class="bi bi-trash3"></i>
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


    @foreach($suite->children as $suite)
        <div >
            @include('repository.tree_item')
        </div>
    @endforeach

</div>




