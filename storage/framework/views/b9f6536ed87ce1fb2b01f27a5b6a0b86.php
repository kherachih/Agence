<?php $__env->startSection('title'); ?>
    <title><?php echo e(__('translate.Edit Menu')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-header'); ?>
    <h3 class="crancy-header__title m-0"><?php echo e(__('translate.Edit Menu')); ?></h3>
    <p class="crancy-header__text"><?php echo e(__('translate.Manage Content')); ?> >> <?php echo e(__('translate.Menus')); ?> >>
        <?php echo e(__('translate.Edit')); ?></p>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style_section'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.css">
    <style>
        .dd {
            max-width: 100%;
        }

        .dd-item {
            padding: 10px;
        }

        .dd-empty,
        .dd-placeholder {
            height: 40px;
        }

        .dd-handle {
            background: #f7f7f7;
            border: 1px solid #ddd;
            padding: 5px 10px;
            height: auto;
            min-height: 30px;
            cursor: move;
            width: 30px;
            text-align: center;
            border-radius: 3px;
        }

        .dd-handle:hover {
            background: #f0f0f0;
        }

        .menu-item-actions {
            margin-left: 10px;
            display: flex;
            gap: 5px;
        }

        #saveMenuStructure {
            width: 50%;
        }

        .btn-back-list {
            display: block;
            margin-top: 5px;
        }

        .menu-item-title {
            font-weight: bold;
            font-size: 14px;
        }

        .nestable-menu {
            margin-top: 20px;
        }

        .menu-item-content {
            padding: 8px;
            background-color: #f8f9fa;
            border-radius: 3px;
        }

        .d-flex.align-items-center {
            background-color: #fff;
            padding: 5px;
            border-radius: 4px;
            border: 1px solid #eee;
        }

    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('body-content'); ?>
    <section class="crancy-adashboard crancy-show mg-top-30">
        <div class="container container__bscreen">
            <div class="crancy-product-card">
                <div class="row">
                    <div class="col-12">
                        <div class="crancy-body">
                            <div class="crancy-dsinner">
                                <div class="row">
                                    <div class="col-md-4">
                                        <!-- Menu Settings Form -->
                                        <div class="card mb-4">
                                            <div class="card-header">
                                                <h5><?php echo e(__('translate.Menu Settings')); ?></h5>
                                            </div>
                                            <div class="card-body">
                                                <form action="<?php echo e(route('admin.menus.update', $menu->id)); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('PUT'); ?>

                                                    <div class="mb-3">
                                                        <label class="form-label"><?php echo e(__('translate.Name')); ?> *</label>
                                                        <input type="text" name="name" class="form-control"
                                                            value="<?php echo e($menu->name); ?>" required>
                                                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <small class="text-danger"><?php echo e($message); ?></small>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label"><?php echo e(__('translate.Description')); ?></label>
                                                        <textarea name="description" class="form-control" rows="3"><?php echo e($menu->description); ?></textarea>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label"><?php echo e(__('translate.Menu Location')); ?></label>
                                                        <select name="location" class="form-select">
                                                            <option value=""><?php echo e(__('translate.None')); ?></option>
                                                            <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($location); ?>"
                                                                    <?php echo e($menu->location === $location ? 'selected' : ''); ?>>
                                                                    <?php echo e($details['name']); ?> - <?php echo e($details['description']); ?>

                                                                </option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" name="status"
                                                                id="statusSwitch" <?php echo e($menu->status ? 'checked' : ''); ?>>
                                                            <label class="form-check-label"
                                                                for="statusSwitch"><?php echo e(__('translate.Active')); ?></label>
                                                        </div>
                                                    </div>

                                                    <button type="submit"
                                                        class="btn btn-primary"><?php echo e(__('translate.Update Menu')); ?></button>
                                                    <a href="<?php echo e(route('admin.menus.index')); ?>"
                                                        class="btn btn-secondary btn-back-list"><?php echo e(__('translate.Back to List')); ?></a>
                                                </form>
                                            </div>
                                        </div>

                                        <!-- Add Menu Item Form -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5><?php echo e(__('translate.Add Menu Item')); ?></h5>
                                            </div>
                                            <div class="card-body">
                                                <form action="<?php echo e(route('admin.menus.add-item', $menu->id)); ?>"
                                                    method="POST" class="add-menu-item-form">
                                                    <?php echo csrf_field(); ?>

                                                    <div class="mb-3">
                                                        <label class="form-label"><?php echo e(__('translate.Title')); ?> *</label>
                                                        <input type="text" name="title" class="form-control" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label"><?php echo e(__('translate.URL')); ?></label>
                                                        <input type="text" name="url" class="form-control"
                                                            placeholder="e.g., /about-us">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label"><?php echo e(__('translate.Item Type')); ?></label>
                                                        <select name="type" class="form-select" id="menuItemType">
                                                            <option value="custom"><?php echo e(__('translate.Custom Link')); ?>

                                                            </option>
                                                            <option value="page"><?php echo e(__('translate.Page')); ?></option>
                                                            <option value="category"><?php echo e(__('translate.Category')); ?>

                                                            </option>
                                                        </select>
                                                    </div>

                                                    <div class="mb-3" id="typeIdField" style="display: none;">
                                                        <label class="form-label"><?php echo e(__('translate.Select Item')); ?></label>
                                                        <select name="type_id" class="form-select">
                                                            <option value=""><?php echo e(__('translate.Select Item')); ?>

                                                            </option>
                                                            <!-- Dynamic options will be populated by JS -->
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label"><?php echo e(__('translate.Icon Class')); ?></label>
                                                        <input type="text" name="icon_class" class="form-control"
                                                            placeholder="e.g., fas fa-home">
                                                        <small
                                                            class="text-muted"><?php echo e(__('translate.FontAwesome or other icon classes')); ?></small>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label"><?php echo e(__('translate.Target')); ?></label>
                                                        <select name="target" class="form-select">
                                                            <option value="_self"><?php echo e(__('translate.Same Window')); ?>

                                                            </option>
                                                            <option value="_blank"><?php echo e(__('translate.New Window')); ?>

                                                            </option>
                                                        </select>
                                                    </div>

                                                    <button type="submit"
                                                        class="btn btn-primary"><?php echo e(__('translate.Add Item')); ?></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <!-- Menu Structure -->
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <h5><?php echo e(__('translate.Menu Structure')); ?></h5>
                                                <button id="saveMenuStructure"
                                                    class="btn btn-primary"><?php echo e(__('translate.Save Menu Structure')); ?></button>
                                            </div>
                                            <div class="card-body">
                                                <?php if(count($menuItems) > 0): ?>
                                                    <p><?php echo e(__('translate.Drag and drop items to reorder. Click on an item to edit its properties.')); ?>

                                                    </p>

                                                    <div class="nestable-menu">
                                                        <div class="dd" id="nestable">
                                                            <ol class="dd-list">
                                                                <?php $__currentLoopData = $menuItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <li class="dd-item" data-id="<?php echo e($item->id); ?>">
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="dd-handle me-2">
                                                                                <i class="fas fa-grip-vertical"></i>
                                                                            </div>
                                                                            <div class="menu-item-content flex-grow-1">
                                                                                <span class="menu-item-title">
                                                                                    <?php if($item->icon_class): ?>
                                                                                        <i
                                                                                            class="<?php echo e($item->icon_class); ?>"></i>
                                                                                    <?php endif; ?>
                                                                                    <?php echo e($item->title); ?>

                                                                                </span>
                                                                            </div>
                                                                            <div class="menu-item-actions">
                                                                                <button type="button"
                                                                                    class="btn btn-sm btn-info edit-menu-item"
                                                                                    data-id="<?php echo e($item->id); ?>"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#editItemModal">
                                                                                    <i class="fas fa-edit"></i>
                                                                                </button>
                                                                                <button type="button"
                                                                                    class="btn btn-sm btn-danger delete-menu-item"
                                                                                    data-id="<?php echo e($item->id); ?>">
                                                                                    <i class="fas fa-trash"></i>
                                                                                </button>
                                                                            </div>
                                                                        </div>

                                                                        <?php if(count($item->children) > 0): ?>
                                                                            <ol class="dd-list">
                                                                                <?php $__currentLoopData = $item->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <li class="dd-item"
                                                                                        data-id="<?php echo e($child->id); ?>">
                                                                                        <div
                                                                                            class="d-flex align-items-center">
                                                                                            <div class="dd-handle me-2">
                                                                                                <i
                                                                                                    class="fas fa-grip-vertical"></i>
                                                                                            </div>
                                                                                            <div
                                                                                                class="menu-item-content flex-grow-1">
                                                                                                <span
                                                                                                    class="menu-item-title">
                                                                                                    <?php if($child->icon_class): ?>
                                                                                                        <i
                                                                                                            class="<?php echo e($child->icon_class); ?>"></i>
                                                                                                    <?php endif; ?>
                                                                                                    <?php echo e($child->title); ?>

                                                                                                </span>
                                                                                            </div>
                                                                                            <div class="menu-item-actions">
                                                                                                <button type="button"
                                                                                                    class="btn btn-sm btn-info edit-menu-item"
                                                                                                    data-id="<?php echo e($child->id); ?>"
                                                                                                    data-bs-toggle="modal"
                                                                                                    data-bs-target="#editItemModal">
                                                                                                    <i
                                                                                                        class="fas fa-edit"></i>
                                                                                                </button>
                                                                                                <button type="button"
                                                                                                    class="btn btn-sm btn-danger delete-menu-item"
                                                                                                    data-id="<?php echo e($child->id); ?>">
                                                                                                    <i
                                                                                                        class="fas fa-trash"></i>
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </li>
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            </ol>
                                                                        <?php endif; ?>
                                                                    </li>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </ol>
                                                        </div>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="alert alert-info">
                                                        <?php echo e(__('translate.No menu items found. Add your first menu item using the form.')); ?>

                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Edit Menu Item Modal -->
    <div class="modal fade" id="editItemModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('translate.Edit Menu Item')); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editItemForm" action="" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="mb-3">
                            <label class="form-label"><?php echo e(__('translate.Title')); ?> *</label>
                            <input type="text" name="title" id="edit_title" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><?php echo e(__('translate.URL')); ?></label>
                            <input type="text" name="url" id="edit_url" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><?php echo e(__('translate.CSS Class')); ?></label>
                            <input type="text" name="css_class" id="edit_css_class" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><?php echo e(__('translate.Icon Class')); ?></label>
                            <input type="text" name="icon_class" id="edit_icon_class" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><?php echo e(__('translate.Target')); ?></label>
                            <select name="target" id="edit_target" class="form-select">
                                <option value="_self"><?php echo e(__('translate.Same Window')); ?></option>
                                <option value="_blank"><?php echo e(__('translate.New Window')); ?></option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="status" id="edit_status">
                                <label class="form-check-label" for="edit_status"><?php echo e(__('translate.Active')); ?></label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal"><?php echo e(__('translate.Cancel')); ?></button>
                    <button type="button" class="btn btn-primary"
                        id="saveMenuItem"><?php echo e(__('translate.Save Changes')); ?></button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteItemModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('translate.Delete Menu Item')); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><?php echo e(__('translate.Are you sure you want to delete this menu item? All sub-items will also be deleted.')); ?>

                    </p>
                </div>
                <div class="modal-footer">
                    <form id="deleteItemForm" action="" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal"><?php echo e(__('translate.Cancel')); ?></button>
                            <button type="submit" class="btn btn-danger"><?php echo e(__('translate.Delete')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js_section'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.js"></script>
    <script>
        $(function() {
            // Initialize Nestable with the handle option
            var updateOutput = function(e) {
                var list = e.length ? e : $(e.target);
                if (window.JSON) {
                    // Get the Nestable list data
                    var data = window.JSON.stringify(list.nestable('serialize'));
                    console.log(data);
                }
            };

            $('#nestable').nestable({
                group: 1,
                maxDepth: 2,
                handleClass: 'dd-handle' // Specify that only elements with dd-handle class are draggable
            }).on('change', updateOutput);

            // Menu Item Type Change
            $('#menuItemType').on('change', function() {
                var type = $(this).val();
                if (type !== 'custom') {
                    $('#typeIdField').show();
                    // You can load dynamic options based on the selected type
                } else {
                    $('#typeIdField').hide();
                }
            });

            // Edit Menu Item - ensure event delegation for dynamically added elements
            $(document).on('click', '.edit-menu-item', function(e) {
                e.preventDefault();
                e.stopPropagation(); // Prevent event bubbling to parent elements

                var id = $(this).data('id');

                // Fetch menu item data via AJAX
                $.ajax({
                    url: '<?php echo e(url('admin/menu-items')); ?>/' + id + '/edit',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // Populate the form with the menu item data
                        $('#edit_title').val(data.title);
                        $('#edit_url').val(data.url);
                        $('#edit_css_class').val(data.css_class);
                        $('#edit_icon_class').val(data.icon_class);
                        $('#edit_target').val(data.target);
                        $('#edit_status').prop('checked', data.status == 1);

                        // Set the form action URL
                        $('#editItemForm').attr('action', '<?php echo e(url('admin/menu-items')); ?>/' +
                            id);

                        // Show modal
                        $('#editItemModal').modal('show');
                    },
                    error: function() {
                        alert('<?php echo e(__('translate.Error fetching menu item data')); ?>');
                    }
                });
            });

            // Save Menu Item (Submit form)
            $('#saveMenuItem').on('click', function() {
                $('#editItemForm').submit();
            });

            // Delete Menu Item - ensure event delegation
            $(document).on('click', '.delete-menu-item', function(e) {
                e.preventDefault();
                e.stopPropagation(); // Prevent event bubbling

                var id = $(this).data('id');
                $('#deleteItemForm').attr('action', '<?php echo e(url('admin/menu-items')); ?>/' + id);
                $('#deleteItemModal').modal('show');
            });

            // Save Menu Structure
            $('#saveMenuStructure').on('click', function() {
                var data = $('#nestable').nestable('serialize');

                $.ajax({
                    url: '<?php echo e(route('admin.menus.update-structure')); ?>',
                    type: 'POST',
                    data: {
                        _token: '<?php echo e(csrf_token()); ?>',
                        menu_items: JSON.stringify(data)
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('<?php echo e(__('translate.Menu structure updated successfully')); ?>');
                            location.reload();
                        } else {
                            alert('<?php echo e(__('translate.Error updating menu structure')); ?>');
                        }
                    },
                    error: function() {
                        alert('<?php echo e(__('translate.Error updating menu structure')); ?>');
                    }
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.master_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\resources\views/admin/menus/edit.blade.php ENDPATH**/ ?>