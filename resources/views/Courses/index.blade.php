<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses Management</title>
    <style>
        /* General Page Reset and Layout */
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 40px 20px;
            display: flex;
            justify-content: center;
        }

        /* Main Container Card */
        .container {
            background-color: #ffffff;
            width: 100%;
            max-width: 700px;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        /* Header Styling */
        h1 {
            margin-top: 0;
            color: #111827;
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        /* "Add New" Button Styling */
        .btn-add {
            display: block;
            width: 100%;
            text-align: center;
            background-color: #2563eb;
            color: white;
            padding: 12px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            margin-bottom: 25px;
            transition: background-color 0.2s;
        }

        .btn-add:hover {
            background-color: #1d4ed8;
        }

        /* Divider */
        hr {
            border: 0;
            border-top: 1px solid #e5e7eb;
            margin-bottom: 20px;
        }

        /* Course List Item Styling */
        .course-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            margin-bottom: 10px;
            background-color: #fff;
            transition: transform 0.1s, box-shadow 0.1s;
        }

        .course-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            border-color: #d1d5db;
        }

        .course-info {
            display: flex;
            flex-direction: column;
        }

        .course-title {
            font-size: 16px;
            color: #374151;
            font-weight: 700;
        }

        .course-price {
            color: #059669;
            font-size: 14px;
            margin-top: 4px;
            font-weight: 600;
        }

        /* Action Buttons Group (Right Side) */
        .actions {
            display: flex;
            gap: 10px; /* Space between Edit and Delete */
            align-items: center;
        }

        /* Edit Button Styling */
        .btn-edit {
            background-color: #f3f4f6;
            color: #4b5563;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.2s;
            font-weight: 500;
        }

        .btn-edit:hover {
            background-color: #e5e7eb;
            color: #1f2937;
        }

        /* Delete Button Styling - NEW */
        .btn-delete {
            background-color: #fee2e2; /* Light Red bg */
            color: #991b1b; /* Dark Red text */
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            font-family: inherit; /* Inherit font from body */
            transition: all 0.2s;
        }

        .btn-delete:hover {
            background-color: #fecaca; /* Slightly darker red on hover */
            color: #7f1d1d;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 40px;
            color: #9ca3af;
            font-style: italic;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Course List</h1>
        
        <a href="/courses/create" class="btn-add">+ Add New Course</a>

        <hr>

        @if($courses->count() > 0)
            @foreach($courses as $course)
                <div class="course-item">
                    <div class="course-info">
                        <span class="course-title">{{$course->title}}</span>
                        <span class="course-price">${{$course->price}}</span>
                    </div>
                    
                    <div class="actions">
                        <a href="courses/{{ $course->id }}/edit" class="btn-edit">Edit</a>
                        
                        <form action="/courses/{{ $course->id }}" method="post" style="display:inline;">
                            @csrf 
                            @method('DELETE')
                            <button type="submit" class="btn-delete">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        @else
            <div class="empty-state">
                No Courses Found
            </div>
        @endif
    </div>

</body>
</html>