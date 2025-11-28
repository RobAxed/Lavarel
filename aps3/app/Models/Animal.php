namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = ['nome','especie_id','idade','foto'];

    public function especie()
    {
        return $this->belongsTo(Especie::class);
    }
}
