namespace App\Http\Controllers;

use App\Models\Fishpond;
use Illuminate\Http\Request;

class FishpondController extends Controller
{
    public function index()
    {
        $fishponds = Fishpond::all();
        return view('fishpond.index', compact('fishponds'));
    }

    public function create()
    {
        return view('fishpond.create');
    }

    public function store(Request $request)
    {
        $fishpond = new Fishpond;
        $fishpond->cooperative_id = 1; // Constant value
        $fishpond->name = $request->name;
        $fishpond->description = $request->description;
        // Add other fields as needed
        $fishpond->save();

        return redirect()->route('fishpond.index');
    }

    public function show(Fishpond $fishpond)
    {
        return view('fishpond.show', compact('fishpond'));
    }

    public function edit(Fishpond $fishpond)
    {
        return view('fishpond.edit', compact('fishpond'));
    }

    public function update(Request $request, Fishpond $fishpond)
    {
        $fishpond->name = $request->name;
        $fishpond->description = $request->description;
        // Update other fields as needed
        $fishpond->save();

        return redirect()->route('fishpond.index');
    }

    public function destroy(Fishpond $fishpond)
    {
        $fishpond->delete();
        return redirect()->route('fishpond.index');
    }
}
