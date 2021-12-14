 <div class="row item">
                                <div class="mb-4 col-md-4">
                                    <label  class="form-label"> Front Image </label>
                                    <input type="file" id="front_image"  class="form-control @error('image') is-invalid @enderror" name="front_images[]">
                                    @error('image')
                                    <p class="text-danger"> {{ $message }} </p>
                                    @enderror
                                </div>
                                {{-- <img src="" class="front_image" width="200"> --}}
                            {{--     <div class="mb-4 col-md-2">
                                    <label  class="form-label"> Back image  </label>
                                    <input type="file" id="back_image" class="form-control @error('images') is-invalid @enderror" name="back_images[]">
                                </div> --}}
                                {{--       <img src="" class="back_image" width="200"> --}}
                                <div class="col-md-2">
                                    <label  class="form-label"> Color </label>
                                    <input type="color" name="colors[]" class="form-control" >
                                </div>
                                <div class="col-md-5">
                                    <table class="table table-bordered ">
                                        <thead>
                                            <tr>
                                                <th>size </th>
                                                <th> quantity</th>
                                                <th>
                                                    <a href="" class="add_more_tr">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                                        </svg>
                                                    </a>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class='col-md-8'>
                                                    <select name="sizes[{{ $items }}][]"  class="form-control" >
                                                        @foreach ($sizes as $size)
                                                        <option value="{{ $size->id }}">{{ $size->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td class='col-md-3'>
                                                    <input type="text" class='form-control' name='quantity[{{ $items }}][]' >
                                                </td>
                                                <td>
                                                    <button class="btn btn-danger btn-sm delete_tr"> delete </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class='col-md-1'>
                                    <button  class="btn btn-danger btn-block mt-4 btn-sm delete_item" >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <line x1="4" y1="7" x2="20" y2="7"></line>
                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>