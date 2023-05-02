<form action="{{!empty($actu)?route('user.annonce.edit', $actu->id):route('user.annonce.store')}}" method="post" enctype="multipart/form-data">
    @csrf  
  <div class="mb-5 py-3"> 
  
  <label for="categorie" class="block mb-2 text-sm font-serif text-gray-900 dark:text-white">Catégorie</label>
  <select name="categorie" class="bg-gray-50 border border-gray-300 text-black text-sm font-serif rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-black dark:border-black dark:placeholder-black dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
      <option selected>Choisir une catégorie</option>
    @foreach ( $categories as $itemCategorie )
    @if (!empty($actu) && $itemCategorie->id == $actu->categorie_id)
      <option value="{{$itemCategorie->id}}" selected>{{$itemCategorie->name}}</option>
    @else
      <option value="{{$itemCategorie->id}}">{{$itemCategorie->name}}</option>           
    @endif
  
    @endforeach 
  </select>

    @error('categorie')
        <p class="text-base font-serif text-[#ff1010]">Merci de sélectionner une catégorie !</p> 
    @enderror
  
  </div>
  
  <div class="mb-5 py-3">
  
  <label for="helper-text" class="block mb-2 text-sm font-serif text-gray-900 dark:text-black">Titre</label>
  <input type="text" name="nomAnnonce" value="{{!empty($actu)?$actu->name:''}}" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm font-serif rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Saisissez un titre pour votre annonce">
  @error('nomAnnonce')
      <p class="text-base font-serif text-[#ff1010]">Merci de saisir un titre !</p> 
    @enderror
  </div>
  
  <div class="mb-5 py-3">
      <label
        for="description"
        class="mb-3 block text-base font-serif text-[#000000]"
      >
        Description
      </label>
      <textarea
        rows="4"
        name="description"
        placeholder="Saissisez une description"
        class="w-full resize-none rounded-md border border-gray-300 bg-white py-3 px-6 text-base font-serif text-[#000000] outline-none focus:border-[#000000] focus:shadow-md">
        {{!empty($actu)?$actu->description:''}}</textarea>
    </div>
  
    <div class="mb-5 py-3">
  
      <label for="helper-text" class="block mb-2 text-sm font-serif text-gray-900 dark:text-black">Prix</label>
      <input type="number" name="prix" value="" aria-describedby="helper-text-explanation" class="bg-gray-50 border font-serif border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Saisissez un prix pour votre annonce">
      
        @error('prix')
            <p class="text-base font-serif text-[#ff1010]">Merci de saisir un prix !</p> 
        @enderror

    </div>
  
    <div class="mb-5">
      <label for="image" class="mb-3 block text-base font-serif text-[#000000]"> Ajouter une image </label>
      @isset($actu)
        <img
        class="h-20 w-20 object-cover object-center p-2"
        src="{{Storage::url($actu->image)}}"
        alt=""
        />
      @endisset
      
      <input
        type="file"
        name="image"
        placeholder="Sélectionner une image"
        class="w-full rounded-md border border-gray-300 bg-white py-3 px-6 text-base font-serif text-[#000000] outline-none focus:border-[#000000] focus:shadow-md"
      />
      @error('image')
        <p class="text-base font-serif text-[#ff1010]">Ajouter une image au bon format !</p> 
      @enderror
    </div>
  
  <div class="py-10">
  <button type="submit" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">
      <span class="relative px-5 py-2.5 font-serif transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
          {{!empty($actu)?'Modifier':'Valider'}}
      </span>
    </button>
  </div>
  
  </form> 

  