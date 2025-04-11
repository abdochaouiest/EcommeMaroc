<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product</title>
    <link href="{{ asset('index/css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="product-form-container">
            <div class="form-header">
                <h1 class="form-title">Edit Product</h1>
                <hr class="form-divider">
            </div>
            
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <!-- Image Upload Section -->
                <<div class="form-section">
                    <label class="section-label">Product Image</label>
                    <div class="image-upload-box @if($product->photo) has-image @endif">
                        <div class="upload-placeholder" @if($product->photo) style="display:none" @endif>
                            <i class="fas fa-cloud-upload-alt"></i>
                            <p>Click to upload or drag and drop</p>
                            <span>Recommended: 800x800px (JPG, PNG)</span>
                        </div>
                        <input type="file" name="photo" id="product-photo" class="image-input">
                        @if($product->photo)
                            <img id="image-preview" class="preview-image" src="{{ $product->photo}}" style="display:block">
                        @else
                            <img id="image-preview" class="preview-image">
                        @endif
                    </div>
                    @if($product->photo)
                        <input type="hidden" name="current_photo" value="{{ $product->photo }}">
                    @endif
                </div>
                
                <!-- Basic Information Section -->
                <div class="form-section">
                    <label class="section-label">Basic Information</label>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="product-name">Product Name</label>
                            <input type="text" name="name" id="product-name" 
                                   class="form-control" 
                                   placeholder="Enter product name" value="{{ $product->name }} "required>
                            
                        </div>
                        
                        <div class="form-group">
                            <label for="product-category">Category</label>
                            <select name="Category" id="product-category" 
                                    class="form-control">
                                <option value="{{ $product->Category }}">{{ $product->Category }}</option>
                                <option value="electronics">Electronics</option>
                                <option value="clothing">Clothing</option>
                                <option value="home">Home & Kitchen</option>
                            </select>
    
                        </div>
                    </div>
                </div>
                
                <!-- Inventory & Pricing Section -->
                <div class="form-section">
                    <label class="section-label">Inventory & Pricing</label>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="product-quantity">Quantity</label>
                            <input type="number" name="quantity" id="product-quantity" 
                                   class="form-control" 
                                   placeholder="Available stock" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="product-price">Price ($)</label>
                            <div class="input-with-symbol">
                                <span class="currency-symbol">$</span>
                                <input type="number" step="0.01" name="price" id="product-price" 
                                       class="form-control" 
                                       placeholder="0.00" value="{{ $product->price }}" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="product-code">Product Code</label>
                            <input type="text" name="product_code" id="product-code" 
                                   class="form-control" 
                                   placeholder="Unique identifier" value="{{ $product->product_code }} " required>
                        </div>
                    </div>
                </div>
                
                <!-- Description Section -->
                <div class="form-section">
                    <label class="section-label">Description</label>
                    <textarea name="description" id="product-description" 
                              class="form-control" 
                              rows="5" placeholder="Detailed product description">{{ $product->description }}</textarea>
                
                </div>
                
                <!-- Form Actions -->
                <div class="form-actions">
                    <button type="submit" class="submit-btn">
                        <i class="fas fa-plus-circle"></i> Update Product
                    </button>
                    <a href="{{ route('dashboard.admin') }}" class="cancel-btn">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Image preview functionality
        const imageInput = document.getElementById('product-photo');
        const imagePreview = document.getElementById('image-preview');
        const uploadBox = document.querySelector('.image-upload-box');
        const placeholder = document.querySelector('.upload-placeholder');
        
        imageInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    placeholder.style.display = 'none';
                    imagePreview.style.display = 'block';
                    uploadBox.classList.add('has-image');
                }
                reader.readAsDataURL(this.files[0]);
            }
        });
        
        // Drag and drop functionality
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            uploadBox.addEventListener(eventName, preventDefaults, false);
        });
    
        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }
    
        ['dragenter', 'dragover'].forEach(eventName => {
            uploadBox.addEventListener(eventName, highlight, false);
        });
    
        ['dragleave', 'drop'].forEach(eventName => {
            uploadBox.addEventListener(eventName, unhighlight, false);
        });
    
        function highlight() {
            uploadBox.classList.add('highlight');
        }
    
        function unhighlight() {
            uploadBox.classList.remove('highlight');
        }
    
        uploadBox.addEventListener('drop', handleDrop, false);
    
        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            imageInput.files = files;
            const event = new Event('change');
            imageInput.dispatchEvent(event);
        }
    });
    </script>
    
    <style>
    
    .product-form-container {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        padding: 30px;
    }
    
    .form-header {
        margin-bottom: 30px;
    }
    
    .form-title {
        font-size: 24px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 10px;
    }
    
    .form-divider {
        border: none;
        height: 1px;
        background-color: #e0e0e0;
        margin: 15px 0;
    }
    
    /* Form Sections */
    .form-section {
        margin-bottom: 25px;
    }
    
    .section-label {
        display: block;
        font-weight: 500;
        color: #34495e;
        margin-bottom: 15px;
        font-size: 16px;
    }
    
    .form-row {
        display: flex;
        gap: 150px;
    flex-wrap: wrap;
        margin-bottom: 15px;
        
    }
    
    .form-group {
        flex: 1;
    }
    
    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-size: 14px;
        color: #7f8c8d;
    }
    
    .form-control {
        width: 90%;
        padding: 10px 15px;
        height: 50px;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 14px;
        transition: border-color 0.3s;
    }
    
    .form-control:focus {
        border-color: #3b5d50;
        outline: none;
        box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
    }
    
    /* Image Upload */
    .image-upload-box {
        border: 2px dashed #bdc3c7;
        border-radius: 8px;
        padding: 30px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s;
        position: relative;
        min-height: 200px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #f9f9f9;
    }
    
    .image-upload-box.highlight {
        border-color: #3498db;
        background-color: rgba(52, 152, 219, 0.05);
    }
    
    .image-upload-box.has-image {
        border-color: #3b5d50;
        background-color: transparent;
    }
    
    .upload-placeholder {
        text-align: center;
    }
    
    .upload-placeholder i {
        font-size: 40px;
        color: #bdc3c7;
        margin-bottom: 10px;
    }
    
    .upload-placeholder p {
        margin: 5px 0;
        color: #7f8c8d;
    }
    
    .upload-placeholder span {
        font-size: 12px;
        color: #bdc3c7;
    }
    
    .image-input {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        opacity: 0;
        cursor: pointer;
    }
    
    .preview-image {
        max-width: 100%;
        max-height: 300px;
        display: none;
        border-radius: 4px;
    }
    
    /* Price Input */
    .input-with-symbol {
        position: relative;
    }
    
    .currency-symbol {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: #7f8c8d;
    }
    
    .input-with-symbol .form-control {
        padding-left: 30px;
    }
    
    /* Textarea */
    #product-description {
        min-height: 120px;
        resize: vertical;
    }
    
    /* Form Actions */
    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 15px;
        margin-top: 30px;
    }
    
    .submit-btn {
        background-color: #3b5d50;
        color: white;
        border: none;
        padding: 12px 25px;
        border-radius: 6px;
        font-size: 15px;
        font-weight: 500;
        cursor: pointer;
        transition: background-color 0.3s;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .submit-btn:hover {
        background-color: #3b5d50;
    }
    
    .cancel-btn {
        background-color: #f5f5f5;
        color: #7f8c8d;
        border: none;
        padding: 12px 25px;
        border-radius: 6px;
        font-size: 15px;
        font-weight: 500;
        cursor: pointer;
        transition: background-color 0.3s;
        text-decoration: none;
        text-align: center;
    }
    
    .cancel-btn:hover {
        background-color: #e0e0e0;
    }
    
    /* Error Handling */
    .is-invalid {
        border-color: #e74c3c !important;
    }
    
    .error-message {
        color: #e74c3c;
        font-size: 13px;
        margin-top: 5px;
    }
    </style>
</body>
</html>
