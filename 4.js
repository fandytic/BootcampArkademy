function thirdHighest(input)
{
    let tipe = typeof input;
    let angkaTerbesar = 0;
    let angkaTerbesar2 = input[0];
    let angkaTerbesar3 = input[0];
    if(tipe == "string")
    {
        return "bukan array nih";
    }
    if(tipe.length <= 3)
    {
        return "Minimal array length is 3!"
    }
    for(let i = 0 ; i < input.length ; i++)
    {
        if(input[i] > angkaTerbesar)
        {
            angkaTerbesar2 = angkaTerbesar;
            angkaTerbesar = input[i];
        }
        else if(input[i] > angkaTerbesar2 && input[i] < angkaTerbesar )
        {
            angkaTerbesar2 = input[i];
        }
    }

    for(let i = 0 ;  i < input.length ; i++)
    {
        if(input[i] > angkaTerbesar3 && input[i] < angkaTerbesar2)
        {
            angkaTerbesar3 = input[i];
        }
    }

    return angkaTerbesar3;
}