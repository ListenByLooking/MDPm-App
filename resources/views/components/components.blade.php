<div id="Component_modal" class="modal fade flip"  role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form method="POST" id="component_form">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Components</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <div class="col-12 dpo_parents" id="Component_parent">
                        <div class="row">
                            <div class="col-3 bg-success-subtle">
                                <div class="form-group mb-2">
                                    <label for="title" class="form-label">Components</label>
                                    <select class="form-control select4" name="component" id="Component" onchange="activity.component(this)" >
                                        <option value="">Select</option>
                                        <option value="Hardware">Hardware</option>
                                        <option value="Software">Software</option>
                                        <option value="AudioVisual">AudioVisual</option>
                                        <option value="Varius">Varius</option>
                                    </select>
                                </div>
                                <div class="components_div" id="AudioVisual_parent">
                                    <div class="form-group mb-2">
                                        <label for="title" class="form-label">Audiovisual Types</label>
                                        <select class="form-control select4" name="audiovisual" id="Audiovisual" onchange="activity.audiovisual(this)" >
                                            <option value="">Select</option>
                                            <option value="Video">Video</option>
                                            <option value="Photo">Photo</option>
                                            <option value="Audio">Audio</option>
                                            <option value="Film">Film</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="components_div" id="originaldocs_parent">
                                    <div class="form-group mb-2">
                                        <label for="title" class="form-label">Original Docs</label>
                                        <select class="form-control select4" id="originaldocs" name="originaldocs" onchange="activity.originaldocs(this)" >
                                            <option value="">Select</option>
                                            <option value="Original">Original Docs</option>
                                            <option value="Digital">Digital Copy</option> 
                                        </select>
                                    </div>
                                </div>
                                <div class="components_div" id="originaldocs_sub_parent">
                                    <div class="form-group mb-2">
                                        <label for="title" class="form-label">Original Docs</label>
                                        <select class="form-control select4" id="originaldocs1" name="originaldocs1" onchange="activity.originaldocs_sub(this)"> 
                                                <option value="">Select</option> 
                                                <option value="audiocassette">Audiocassette</option>
                                                <option value="dat">DAT</option>
                                                <option value="openreeltape">Open Reel Tape</option>
                                                <option value="phonographicdisks">Phonographic Disks</option> 
                                        </select>
                                    </div>
                                </div>
                            </div>                        
                            <div class="col-9 border border-left" id="append_response_form">
                            
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="modal-footer border border-top">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="dpo.save()">Save Changes</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->   

<x-digitalcopy :id="$id" />
<x-originaldocs :id="$id" />
<x-tapedetails :id="$id" />
<x-audiocassette :id="$id" />
<x-dat :id="$id" />
<x-phonographic :id="$id" /> 