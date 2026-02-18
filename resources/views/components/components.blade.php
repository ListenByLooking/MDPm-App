<div id="Component_modal" class="modal fade flip" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form method="POST" id="component_form" action="javascript:dpo.save()">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Component</h5>
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
                                        <option value="AudioVisual">Audio/Visual</option>
                                        <option value="General">General Object</option>
                                    </select>
                                </div>
                                <div class="components_div" id="AudioVisual_parent">
                                    <div class="form-group mb-2">
                                        <label for="title" class="form-label">Audiovisual Types</label>
                                        <select class="form-control select4" name="audiovisual" id="Audiovisual" onchange="activity.audiovisual(this)" >
                                            <option value="">Select</option>
                                            <option value="Video">Video</option>
                                            <option value="Photo">Photograph</option>
                                            <option value="Audio">Audio</option>
                                            <option value="Film">Film</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="components_div" id="originaldocs_parent">
                                    <div class="form-group mb-2">
                                        <label for="title" class="form-label">Type</label>
                                        <select class="form-control select4" id="originaldocs" name="originaldocs" onchange="activity.originaldocs(this)" >
                                            <option value="">Select</option>
                                            <option value="Original">Original Item</option>
                                            <option value="Digital">Digital Copy</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="components_div" id="originaldocs_sub_parent">
                                    <div class="form-group mb-2">
                                        <label for="title" class="form-label">Format</label>
                                        <select class="form-control select4" id="originaldocs_sub" name="originaldocs_sub" onchange="activity.originaldocs_sub(this)">
                                                <option value="">Select</option>
                                                <option value="audiocassette">Audio Cassette</option>
                                                <option value="dat">Digital Audio Tape</option>
                                                <option value="digitalaudio">Digital Audio</option>
                                                <option value="openreeltape">Open Reel Tape</option>
                                                <option value="phonographicdisk">Phonographic Disc</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-9 border border-left" id="append_response_form">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border border-top pt-2 pb-2">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<x-adigitalcopy :id="$id"/>
<x-pdigitalcopy :id="$id"/>
<x-vfdigitalcopy :id="$id"/>
<x-film :id="$id"/>
<x-video :id="$id"/>
<x-photo :id="$id"/>
<x-tape :id="$id" />
<x-audiocassette :id="$id" />
<x-dat :id="$id" />
<x-phonographic :id="$id"/>
<x-digitalaudio :id="$id"/>
<x-hardware :id="$id"/>
<x-software :id="$id"/>
<x-general :id="$id"/>
